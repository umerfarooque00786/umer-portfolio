<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cv;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cvs = Cv::latest()->get();
        return view('admin.cvs.index', compact('cvs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cvs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cv_file' => 'required|file|mimes:pdf|max:10240', // 10MB max
            'description' => 'nullable|string|max:500',
            'is_active' => 'boolean'
        ]);

        // Debug: Log the request
        \Log::info('CV Upload Request', [
            'has_file' => $request->hasFile('cv_file'),
            'title' => $request->title,
            'is_active' => $request->boolean('is_active')
        ]);

        if ($request->hasFile('cv_file')) {
            $file = $request->file('cv_file');
            $originalName = $file->getClientOriginalName();
            $filename = time() . '_' . Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.pdf';
            $filePath = 'cv/' . $filename;

            // Debug: Log file details
            \Log::info('CV File Details', [
                'original_name' => $originalName,
                'filename' => $filename,
                'file_path' => $filePath,
                'file_size' => $file->getSize(),
                'mime_type' => $file->getMimeType()
            ]);

            // Store the file
            try {
                // Ensure directory exists
                $cvDir = storage_path('app/public/cv');
                if (!is_dir($cvDir)) {
                    mkdir($cvDir, 0755, true);
                }

                // Try multiple storage methods
                $storedPath = false;

                // Method 1: Direct file copy
                $targetPath = $cvDir . DIRECTORY_SEPARATOR . $filename;
                if (move_uploaded_file($file->getRealPath(), $targetPath)) {
                    $storedPath = 'public/cv/' . $filename;
                } else {
                    // Method 2: Laravel Storage
                    $storedPath = $file->storeAs('public/cv', $filename);
                }

                // Debug: Log storage result
                \Log::info('CV Storage Result', [
                    'stored_path' => $storedPath,
                    'file_exists' => Storage::disk('public')->exists($filePath),
                    'storage_path' => Storage::disk('public')->path($filePath),
                    'file_valid' => $file->isValid(),
                    'file_error' => $file->getError()
                ]);

                // Debug: Check if file was actually stored
                if (!$storedPath || !Storage::disk('public')->exists($filePath)) {
                    \Log::error('CV Upload Failed', [
                        'stored_path' => $storedPath,
                        'file_exists' => Storage::disk('public')->exists($filePath),
                        'file_valid' => $file->isValid(),
                        'file_error' => $file->getError()
                    ]);
                    return back()->with('error', 'Failed to upload CV file. Storage error occurred.');
                }
            } catch (\Exception $e) {
                \Log::error('CV Upload Exception', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
                return back()->with('error', 'Failed to upload CV file. Exception: ' . $e->getMessage());
            }

            // Create CV record
            $cv = Cv::create([
                'title' => $request->title,
                'filename' => $filename,
                'original_name' => $originalName,
                'file_path' => $filePath,
                'file_size' => $file->getSize(),
                'is_active' => $request->boolean('is_active'),
                'description' => $request->description
            ]);

            // If this CV is set as active, deactivate others
            if ($cv->is_active) {
                $cv->setAsActive();
            }

            return redirect()->route('admin.cvs.index')
                ->with('success', 'CV uploaded successfully!');
        }

        return back()->with('error', 'Please select a PDF file to upload.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cv $cv)
    {
        return view('admin.cvs.show', compact('cv'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cv $cv)
    {
        return view('admin.cvs.edit', compact('cv'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cv $cv)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'cv_file' => 'nullable|file|mimes:pdf|max:10240', // 10MB max
            'description' => 'nullable|string|max:500',
            'is_active' => 'boolean'
        ]);

        $updateData = [
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->boolean('is_active')
        ];

        // Handle file upload if new file is provided
        if ($request->hasFile('cv_file')) {
            // Delete old file
            if (Storage::disk('public')->exists($cv->file_path)) {
                Storage::disk('public')->delete($cv->file_path);
            }

            $file = $request->file('cv_file');
            $originalName = $file->getClientOriginalName();
            $filename = time() . '_' . Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '.pdf';
            $filePath = 'cv/' . $filename;

            // Store the new file
            $storedPath = $file->storeAs('public/cv', $filename);

            // Debug: Check if file was actually stored
            if (!$storedPath || !Storage::disk('public')->exists($filePath)) {
                return back()->with('error', 'Failed to upload CV file. Please try again.');
            }

            $updateData = array_merge($updateData, [
                'filename' => $filename,
                'original_name' => $originalName,
                'file_path' => $filePath,
                'file_size' => $file->getSize()
            ]);
        }

        $cv->update($updateData);

        // If this CV is set as active, deactivate others
        if ($cv->is_active) {
            $cv->setAsActive();
        }

        return redirect()->route('admin.cvs.index')
            ->with('success', 'CV updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cv $cv)
    {
        $cv->delete(); // This will also delete the file due to the boot method in the model

        return redirect()->route('admin.cvs.index')
            ->with('success', 'CV deleted successfully!');
    }

    /**
     * Set CV as active
     */
    public function setActive(Cv $cv)
    {
        $cv->setAsActive();

        return redirect()->route('admin.cvs.index')
            ->with('success', 'CV set as active successfully!');
    }
}

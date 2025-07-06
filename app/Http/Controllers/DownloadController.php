<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Cv;

class DownloadController extends Controller
{
    public function cv()
    {
        // Get the active CV
        $cv = Cv::getActive();

        if (!$cv) {
            abort(404, 'No CV available for download');
        }

        // Check if file exists
        if (!Storage::disk('public')->exists($cv->file_path)) {
            abort(404, 'CV file not found');
        }

        return Storage::disk('public')->download($cv->file_path, $cv->original_name);
    }
}

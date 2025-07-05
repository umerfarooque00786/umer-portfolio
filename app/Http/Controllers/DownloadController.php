<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function cv()
    {
        $filePath = 'umer-farooque-cv.pdf';

        if (!Storage::disk('public')->exists($filePath)) {
            abort(404, 'CV file not found');
        }

        return Storage::disk('public')->download($filePath, 'Umer-Farooque-CV.pdf');
    }
}

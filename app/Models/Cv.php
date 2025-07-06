<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Cv extends Model
{
    protected $fillable = [
        'title',
        'filename',
        'original_name',
        'file_path',
        'file_size',
        'is_active',
        'description'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Get the active CV
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }

    /**
     * Set this CV as active and deactivate others
     */
    public function setAsActive()
    {
        // Deactivate all other CVs
        self::where('id', '!=', $this->id)->update(['is_active' => false]);

        // Activate this CV
        $this->update(['is_active' => true]);
    }

    /**
     * Get the full file path
     */
    public function getFullPathAttribute()
    {
        return storage_path('app/public/' . $this->file_path);
    }

    /**
     * Get the download URL
     */
    public function getDownloadUrlAttribute()
    {
        return route('download.cv');
    }

    /**
     * Get formatted file size
     */
    public function getFormattedSizeAttribute()
    {
        $bytes = $this->file_size;
        $units = ['B', 'KB', 'MB', 'GB'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . ' ' . $units[$i];
    }

    /**
     * Delete the CV file when model is deleted
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($cv) {
            if (Storage::disk('public')->exists($cv->file_path)) {
                Storage::disk('public')->delete($cv->file_path);
            }
        });
    }
}

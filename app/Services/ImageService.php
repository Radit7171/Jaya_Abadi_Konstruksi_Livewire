<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ImageService
{
    /**
     * Save uploaded image from client-side processed base64
     * Client-side sudah handle: compression, watermark, format conversion
     */
    public static function saveUploadedImage(string $base64Data): ?string
    {
        try {
            // Decode base64
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Data));

            if (!$imageData) {
                return null;
            }

            // Create folder dengan tanggal (YYYY-MM-DD)
            $dateFolder = now()->format('Y-m-d');
            $filename = Str::random(32) . '.webp';
            $path = "uploads/{$dateFolder}/{$filename}";

            // Save ke public disk
            Storage::disk('public')->put($path, $imageData);

            // Return relative path untuk disimpan di database
            return $path;
        } catch (\Exception $e) {
            Log::error('Error saving uploaded image: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Delete image file
     */
    public static function deleteImage(string $path): bool
    {
        try {
            return Storage::disk('public')->delete($path);
        } catch (\Exception $e) {
            Log::error('Error deleting image: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Get full URL untuk image
     */
    public static function getImageUrl(string $path): string
    {
        return asset('storage/' . $path);
    }

    /**
     * Delete multiple images
     */
    public static function deleteImages(array $paths): bool
    {
        try {
            return Storage::disk('public')->delete($paths);
        } catch (\Exception $e) {
            Log::error('Error deleting multiple images: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Validate base64 image data
     */
    public static function validateBase64Image(string $base64Data): bool
    {
        try {
            $imageData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64Data), true);

            if (!$imageData) {
                return false;
            }

            // Check size (max 350KB setelah compression dari client)
            // Allow slight buffer karena client-side bisa ada variance
            $maxSize = 400 * 1024; // 400KB untuk buffer

            return strlen($imageData) <= $maxSize;
        } catch (\Exception $e) {
            return false;
        }
    }
}

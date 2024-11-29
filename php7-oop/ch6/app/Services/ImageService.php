<?php

namespace App\Services;

class ImageService
{
    /**
     * Upload
     *
     * @param string $file
     * @param array $accepts
     * @param string $filename
     *
     * @return string|null
     */
    public static function create($file, $accepts, $filename)
    {
        $fileinfo =  new \SplFileInfo($file['name']);
        if (in_array(strtolower($fileinfo->getExtension()), $accepts) && is_uploaded_file($file['tmp_name'])) {
            if (move_uploaded_file($file['tmp_name'], $filename)) {
                return json_encode([
                    'uploaded' => 1,
                    'url' => '/images/' . basename($filename)
                ]);
            }
        }

        return false;
    }

    /**
     * Get a Image
     *
     * @param string $path
     *
     * @return string
     */
    public static function read($path)
    {
        if (file_exists($path)) {
            header('Content-type: ' . mime_content_type($path));

            return file_get_contents($path);
        }
    }
}

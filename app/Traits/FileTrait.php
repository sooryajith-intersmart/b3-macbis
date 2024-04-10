<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait FileTrait
{
    /**
     * Upload a file to the specified directory.
     *
     * @param \Illuminate\Http\UploadedFile $file The file to be uploaded.
     * @param string $directory The directory where the file will be stored.
     * @return string The file path where the file is stored.
     * @author Sooryajith
     */
    public function uploadFile($file, $directory)
    {
        $fileName  = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $filePath   = 'uploads/' . $directory . '/' . $fileName;

        $file->storeAs('public/uploads/' . $directory, $fileName);

        return $filePath;
    }

   /**
     * Delete a file associated with the specified field name.
     *
     * @param string $fieldName The name of the field representing the file.
     * @return bool True if the file was successfully deleted, false otherwise.
     * @author Sooryajith
     */
    public function deleteFile($fieldName)
    {
        if ($this->$fieldName && Storage::disk('public')->exists($this->$fieldName) && Storage::disk('public')->delete($this->$fieldName)) {;
            return true;
        } else {
            return false;
        }
    }
}

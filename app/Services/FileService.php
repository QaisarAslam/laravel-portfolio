<?php

namespace App\Services;

class FileService
{
    public function uploadFile($file, $path)
    {
        $originalNameWithExt = $file->getClientOriginalName();
        $originalNameWithoutExt = pathinfo($originalNameWithExt, PATHINFO_FILENAME);
        $fileExt = $file->getClientOriginalExtension();
        $changedName = $originalNameWithoutExt . "_" . time() . "." . $fileExt;
        $file->move(public_path($path), $changedName);

        return $path . $changedName;
    }

    public function deleteFile($file)
    {
        if ($file != null) {
            if(file_exists(public_path($file)))
            {
                unlink(public_path($file));
            }
        }

        return true;
    }
}

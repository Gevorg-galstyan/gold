<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Image;
use Intervention\Image\Constraint;
use Illuminate\Support\Str;

class CloneImage
{
    public static function handle($clone_url, $path='')
    {
        $image = Image::make($clone_url);
        $mime_type = explode('/',$image->mime());
        $mime_type = $mime_type[1]??$mime_type[0];
        $file_name = self::generateFileName($path,$mime_type);
        $fullPath = $path.$file_name.'.'.$mime_type;
        Storage::disk('public')->put($fullPath,  $image->encode());
        return $fullPath;
    }

    protected static function generateFileName($path,$mime_type)
    {
        $file_name = Str::random(20);

        // Make sure the filename does not exist, if it does, just regenerate
        while (Storage::disk(config('public'))->exists($path . $file_name . '.' . $mime_type)) {
            $file_name = Str::random(20);
        }

        return $file_name;
    }
}

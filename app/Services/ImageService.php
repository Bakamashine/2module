<?php

namespace App\Services;

use App\Contracts\IImageService;
use Illuminate\Http\Request;
use Storage;
use Str;

class ImageService implements IImageService
{
    public static string $disk = "public";
    public function UploadImage(Request $request, string $key, string $path): ?string
    {
        if ($request->hasFile($key)) {
            $newName = "mpic_" . Str::random(15) . "." . $request->file($key)->extension();
            $path = Storage::url($request->file($key)->storeAs($path, $newName, self::$disk));
            return $path;
        }
    }
}

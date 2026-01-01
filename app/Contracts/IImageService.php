<?php

namespace App\Contracts;


interface IImageService
{
    public function UploadImage(
        \Illuminate\Http\Request $request,
        string $key,
        string $path
    ): ?string;
}

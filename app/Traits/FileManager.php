<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait FileManager
{
    function image_uploader(string $dir, string $format, $image = null, $old_image = null, $width = 300, $height = 300)
    {
        if ($image == null) return $old_image ?? 'def.png';

        if (isset($old_image)) Storage::disk('public')->delete($dir . $old_image);

        $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $format;
        if (!Storage::disk('public')->exists($dir)) {
            Storage::disk('public')->makeDirectory($dir);
        }

        Storage::disk('public')->put($dir . $imageName, file_get_contents($image));

        return $imageName;
    }

    function file_uploader(string $dir, string $format, $image = null, $old_image = null, $width = 300, $height = 300)
    {
        if ($image == null) return $old_image ?? 'def.png';

        if (isset($old_image)) Storage::disk('public')->delete($dir . $old_image);

        $imageName = \Carbon\Carbon::now()->toDateString() . "-" . uniqid() . "." . $format;
        if (!Storage::disk('public')->exists($dir)) {
            Storage::disk('public')->makeDirectory($dir);
        }
        $image_processed = Image::make($image)->fit($width, $height)->stream();
        Storage::disk('public')->put($dir . $imageName, $image_processed);

        return $imageName;
    }

    function file_remover(string $dir, $file): bool
    {
        if (!isset($image)) return true;

        if (Storage::disk('public')->exists($dir . $image)) Storage::disk('public')->delete($dir . $file);

        return true;
    }
}


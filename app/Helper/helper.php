<?php

namespace App\Helper;

use Illuminate\Support\Str;

class Helper
{
    public static function imageUpload($file, String $path)
    {
        $name = date('d-m-Y-H-i-s') . '.' . $file->extension();
        $file->move(public_path($path), $name);
        $move = $path . '/' .  $name;
        return $move;
    }

    public static function deleteOldImage(string $path)
    {
        return unlink(public_path($path));
    }
}

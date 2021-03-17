<?php

namespace App\Traits;


use File;
use Image;

use Illuminate\Support\Facades\Storage;

trait ImageTrait
{
    public function storeImage($slika, $storage_disk, $r, $defaultPictures, $width = false, $height = false, $edit = false, $imageOld = '')
    {
        if ($r->hasFile($slika))
        {
            $image = $r->file($slika);
            $name = time().'.'.$image->getClientOriginalExtension();
            $makeImage = ($width && $height) ? Image::make($image)->fit($width, $height) : Image::make($image);
            $path = Storage::disk($storage_disk)->path($name);
            if(Storage::disk($storage_disk)->put($name, $makeImage->save($path)))
            {
                if($edit)
                {
                    if($imageOld != NULL && $imageOld != $defaultPictures)
                    {
                        Storage::disk($storage_disk)->exists($imageOld) ? Storage::disk($storage_disk)->delete($imageOld) : "";
                    }
                }
                return $name;
            }
        }
        else
        {
            return $edit ? $imageOld : $defaultPictures;
        }
    }
}

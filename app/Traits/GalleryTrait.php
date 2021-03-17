<?php

namespace App\Traits;

use File;
use Image;
use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

trait GalleryTrait
{
    public function storeGallery($picFromInput, $storage_disk, $idNews, $edit = false)
    {
        if (Input::has($picFromInput))
        {
            $gallery = Input::file($picFromInput);
            $insert = array();
            $dozvoljeneEkstenzije = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];
            for ($i=0; $i < count($gallery); $i++)
            {
                $image = $gallery[$i];
                if ( in_array(File::extension($image->getClientOriginalName()), $dozvoljeneEkstenzije) )
                {
                    $file_name = 'news-gallery-'.time()."-".Str::random(5).'-'.$image->getClientOriginalName();
                    $makeImage = Image::make($image);
                    $path = Storage::disk($storage_disk)->path($file_name);
                    Storage::disk($storage_disk)->put($file_name, $makeImage->save($path));
                    $insert[] = ['id_news' => $idNews, 'image' => $file_name];
                }
            }
            if($edit)
            {
                $staragalerija = Gallery::where('id_news', '=', $idNews)->get();
                if (!empty($insert))
                {
                    $idslike=array();
                    foreach($staragalerija as $slika)
                    {
                        if(Storage::disk($storage_disk)->exists($slika->image))
                        {
                            $idslike[] = $slika->id;
                            Storage::disk($storage_disk)->delete($slika->image);
                        }
                    }
                    Gallery::insert($insert);
                    Gallery::destroy($idslike);
                }
            }
            else{
                Gallery::insert($insert);
            }
        }
        return true;

    }
    public function deleteGallery($id, $storage_disk)
    {
        $img = Gallery::where('id_news', '=', $id)->get();
        foreach($img as $slika)
        {
            if(Storage::disk($storage_disk)->exists($slika->image))
            {
                Storage::disk($storage_disk)->delete($slika->image);
            }
        }
        return true;
    }
}

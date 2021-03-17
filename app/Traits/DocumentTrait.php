<?php

namespace App\Traits;

use App\Models\Document;
use File;
use Image;
use App\Models\Gallery;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

trait DocumentTrait
{
    public function storeDocument($picFromInput, $storage_disk, $idPage, $edit = false)
    {
        if (Input::has($picFromInput))
        {
            $gallery = Input::file($picFromInput);
            $insert = array();
            $dozvoljeneEkstenzije = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG','ppt','pptx','doc','docx','pdf','xls','xlsx'];
            for ($i=0; $i < count($gallery); $i++)
            {
                $image = $gallery[$i];
                if ( in_array(File::extension($image->getClientOriginalName()), $dozvoljeneEkstenzije) )
                {
                    $file_name = $image->getClientOriginalName();
                    $makeImage = Image::make($image);
                    $path = Storage::disk($storage_disk)->path($file_name);
                    Storage::disk($storage_disk)->put($file_name, $makeImage->save($path));
                    $insert[] = ['id_page' => $idPage, 'document' => $file_name];
                }
            }
            if($edit)
            {
                $staragalerija = Document::where('id_page', '=', $idPage)->get();
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
                    Document::insert($insert);
                    Document::destroy($idslike);
                }
            }
            else{
                Document::insert($insert);
            }
        }
        return true;

    }
    public function deleteDocument($id, $storage_disk)
    {
        $img = Document::where('id_page', '=', $id)->get();
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

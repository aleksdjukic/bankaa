<?php

namespace App\Traits;
use Illuminate\Support\Str;

trait SlugTrait
{
    public function slug($class, $column, $naslov)
    {
        $naslov_lat = $this->slug_utf8($naslov);
        $flag = true;
        $br = 1;
        while($flag)
        {
            $tmp = ($class::where($column, $naslov_lat)->first());

            if(!$tmp){
                $flag = false;
            }
            else{
                $naslov_lat .= $br++;
            }
        }
        return $naslov_lat;
    }

    public function slug_utf8($title, $separator = '-')
    {
        $flip = $separator == '-' ? '_' : '-';
        $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);
        $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));
        $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);
        $title = $this->zamjenaKarakteraSlug($title);

        return trim($title, $separator);
    }

    protected function zamjenaKarakteraSlug($original)
    {
        $abeceda = array("A","B","C","C","C","D","Dj","E","F","G","H","I","J","K","L","Lj","M","N","Nj","O","P","R","S","T","U","V","Z","Z","S","Dz","a","b","c","c","c","d","dj","e","f","g","h","i","j","k","l","lj","m","n","nj","o","p","r","s","t","u","v","z","z","s","dz", "C", "c", "C", "c", "Dj", "dj", "Z", "z", "S", "s");
        $cirilica=array("А","Б","Ц","Ч","Ћ","Д","Ђ","Е","Ф","Г","Х","И","Ј","К","Л","Љ","М","Н","Њ","О","П","Р","С","Т","У","В","З","Ж","Ш","Џ","а","б","ц","ч","ћ","д","ђ","е","ф","г","х","и","ј","к","л","љ","м","н","њ","о","п","р","с","т","у","в","з","ж","ш","џ", "Ć", "ć", "Č", "č", "Đ", "đ", "Ž", "ž", "Š", "š");

        return str_replace($cirilica, $abeceda, $original);
    }
}

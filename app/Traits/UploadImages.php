<?php
namespace App\Traits;
trait UploadImages{

    function saveImages($image,$dist){

        $ext = $image->getClientOriginalExtension();  // to get the extension of the photo from form

        $file_name = time().'.'.$ext;

        $path = $dist;

        $image->move($path,$file_name);

        return $file_name;
    }
}
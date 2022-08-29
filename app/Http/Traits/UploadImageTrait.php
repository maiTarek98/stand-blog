<?php
namespace App\Http\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait UploadImageTrait {

     public $public_path = "/public/uploadedImages/";
    public $storage_path = "/storage/uploadedImages/";

    public function uploadImg( $file, $path, $width=null, $height=null ) : string
    {
       if ( $file ) {

           $extension       = $file->getClientOriginalExtension();
           $file_name       = $path.'-'.time().'.'.$extension;
           $url             = $file->storeAs($this->public_path,$file_name);
           $public_path     = public_path($this->storage_path.$file_name);
           $img             = Image::make($public_path)->resize($width, $height);
           $url             = preg_replace( "/public/", "", $url );
           return $img->save($public_path) ? $url : '';
       }
    }
}
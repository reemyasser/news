<?php

namespace App\Models\ar;

use Illuminate\Database\Eloquent\Model;

class book_ar extends Model
{
    //
      //
      protected $connection='mysql2';
      protected $table='book_ars';
      protected $fillable=['auther_name','book_name','description','book_id','created_at','updated_at'];
      protected $hidden=['created_at','updated_at'];

   public function book()
   {
       return $this->hasOne('App\Models\main\book','id','book_id');
   }
}

<?php

namespace App\Models\main;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    //
    protected $connection='mysql';
    protected $table='books';
    protected $fillable=['photo','book_id','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    public function book_ar()
    {
        return $this->hasOne('App\Models\ar\book_ar','book_id','id');
    }
    public function book_en()
    {
        return $this->hasOne('App\Models\en\book_en','book_id','id');
    }
}

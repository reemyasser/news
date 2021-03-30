<?php

namespace App\Models\en;

use Illuminate\Database\Eloquent\Model;

class book_en extends Model
{
    //
    protected $connection='mysql3';
    protected $table='book_ens';
    protected $fillable=['auther_name','book_name','description','book_id','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];

    public function book()
    {
        return $this->hasOne('App\Models\main\book','id','book_id');
    }
}

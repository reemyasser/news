<?php

namespace App\Models\ar;

use Illuminate\Database\Eloquent\Model;

class type_ar extends Model
{
    //
    protected $connection='mysql2';
    protected $table='type_ars';
    protected $fillable=['type_name','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
   
   
    public function news()
    {
       return $this->hasMany('App\Models\\mainnews','type_id','id');
    }
}

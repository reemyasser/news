<?php

namespace App\Models\en;

use Illuminate\Database\Eloquent\Model;

class type_en extends Model
{
    //
    protected $connection='mysql3';
    protected $table='type_ens';
    protected $fillable=['type_name','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
   
    public function news()
    {
       return $this->hasMany('App\Models\main\news','type_id','id');
    }
}

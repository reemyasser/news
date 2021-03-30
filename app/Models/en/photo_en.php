<?php

namespace App\Models\en;
use Illuminate\Database\Eloquent\Model;

class photo_en extends Model
{
    //
    protected $connection='mysql3';
    protected $table='photo_ens';
    protected $fillable=['description','photo_id','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    public function photos()
    {
        return $this->hasOne('App\Models\main\photo','id','photo_id');
    
        
    }
   
}

<?php

namespace App\Models\ar;

use Illuminate\Database\Eloquent\Model;

class photo_ar extends Model
{
    //
    protected $connection='mysql2';
    protected $table='photo_ars';
    protected $fillable=['description','photo_id','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    public function photos()
    {
        return $this->hasOne('App\Models\main\photo','id','photo_id');
    
    }
    
    
}

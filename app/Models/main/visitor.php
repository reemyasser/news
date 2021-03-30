<?php

namespace App\Models\main;

use Illuminate\Database\Eloquent\Model;

class visitor extends Model
{
    //
    protected $connection='mysql';
    protected $table='visitors';
    protected $fillable=['count','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
}

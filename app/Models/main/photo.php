<?php

namespace App\Models\main;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    //
    protected $connection='mysql';
    protected $table='photos';
    protected $fillable=['photo_name','news_id','choice','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    public function photo_ar()
    {
        return $this->hasOne('App\Models\ar\photo_ar','photo_id','id');
    
    }
    public function photo_en()
    {
        return $this->hasOne('App\Models\en\photo_en','photo_id','id');
    
    }
  
    public function news()
        {
            return $this->belongsTo('App\Models\main\news','id','news_id');
        }
       
}

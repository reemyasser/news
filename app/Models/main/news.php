<?php

namespace App\Models\main;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    //
    protected $connection='mysql';
    protected $table='news';
    protected $fillable=['media_name','type_id','count','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    public function news_ar()
    {
        return $this->hasOne('App\Models\ar\news_ar','news_id','id');
    
    }
    public function news_en()
    {
        return $this->hasOne('App\Models\en\news_en','news_id','id');
    }
    public function type_en()
    {
        return $this->belongsTo('App\Models\en\type_en','id','type_id');
    }
    public function type_ar()
    {
        return $this->belongsTo('App\Models\ar\type_ar','id','type_id');
    }
    public function photos()
    {
        return $this->hasMany('App\Models\main\photo','news_id','id');
    }
    
}

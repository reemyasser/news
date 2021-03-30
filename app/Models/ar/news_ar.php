<?php

namespace App\Models\ar;

use Illuminate\Database\Eloquent\Model;

class news_ar extends Model
{
    //
    protected $connection='mysql2';
    protected $table='news_ars';
    protected $fillable=['news_text','description','news_id','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    public function news()
    {
        return $this->hasOne('App\Models\main\news','id','news_id');
    
    }
   


    
}

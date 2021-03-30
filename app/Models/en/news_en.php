<?php

namespace App\Models\en;

use Illuminate\Database\Eloquent\Model;

class news_en extends Model
{
    //
    protected $connection='mysql3';
    protected $table='news_ens';
    protected $fillable=['news_text','description','news_id','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    public function news()
    {
        return $this->hasOne('App\Models\main\news','id','news_id');
    
    }
   
   
  
}

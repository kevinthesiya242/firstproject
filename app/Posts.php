<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable =  array('title','category_id','author','image','description');
    public function category(){
    	return $this->belongsTo('category');
    }
}

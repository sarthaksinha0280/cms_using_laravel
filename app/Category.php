<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    
    public function posts(){ //this post method also help us to count no. of post in index page of category
        
        return $this->hasMany(Post::class);
    }

}
	
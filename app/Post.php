<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //use for the softdelete method
//use Illuminate\Support\Facades\Storage;

class post extends Model
{
   
  use SoftDeletes; //class for the softdelete


    protected $fillable = [
    'title','description','content','image','published_at','category_id','user_id'
    ];
    /**
     * 
     * delete post from storage
     * 
     * @return void 
     */

    public function deleteImage(){
      Storage::delete($this->image);
    }



    public function category(){ //this model is also helps us to display the name of category in the posy index page 

      return $this->belongsTo(Category::class);

    }

    public function tags(){
      return $this->belongsToMany(Tag::class);
    }
   
    /**
     * 
     * check if post has tag
     * 
     * @return bool
     *  
     */

//below function is used to check post has tag??
    public function hasTag($tagId){

      return in_array($tagId,$this->tags->pluck('id')->toArray()); 

    }


    public function user()
    {
      
      return $this->belongsTo(User::class);
    
    }

}
 
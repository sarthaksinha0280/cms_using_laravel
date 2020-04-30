<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use App\Tag;
use App\Category; //this is used to fetch the data from the category table in post table;
//use Illuminate\Support\Facades\Storage;
//use App\Http\Requests\Posts\UpdatePostRequest;
class PostsController extends Controller
{
    
    public function __construct(){
   
        $this->middleware('verifyCategoriesCount')->only(['create','store']);

    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        return view('posts.index')->with('posts',Post::all()); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
     /*  hear the category and tag is used because they gives the option in creating new post */
   
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {

      // dd($request->image);
      //$image = $request->image->store('/posts');
      //dd($request->image);//this is used to store the data in the storage file
  // dd($request->all());

      $image = $request->image->store('posts');
      //$image = 'storage/'.$image;
   $post = Post::create([
      'title' => $request->title,
      'description' => $request->description,
      'content'  => $request->content,
      'image'=>$image,
      'published_at' => $request->published_at,
      'category_id' => $request->category,
      'user_id' => auth()->user()->id
       ]);

       if($request -> tags){
           $post->tags()->attach($request->tags);
       }

       session()->flash('success','Post created successfully.');
       return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //dd($post->tags->pluck('id')->toArray());//pluck function used to show the id of tag

        return view('posts.create')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
    /*  hear the category and tag is used because they gives the option in edit the post */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id   
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request,Post $post)
    {
        $data =$request->only(['title','description','published_at','content']);
      //check if new image
      if($request->hasFile('image')){
          //uplaod old one
          $image=$request->image->store('posts');
          $image = 'storage/'.$image;
          //delete old one
         // Storage::delete($post->image);//this is used previously
      $post->deleteImage();

          $data['image'] = $image;
      }

   if($request->tags){
       
    $post->tags()->sync($request->tags);
   
}


      //update attribute
      $post->update($data);

   //falsh massage
    session()->flash('success','Post updated successfully.');
    return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post = Post::withTrashed()->where('id',$id)->firstOrFail();//firstorfail is function to delete very secure
      /* $post = Post::withTrashed()->where('id','> or < or ==',$id)->firstOrFail();
      hear in where condition we pass the condition
      */
       //dd($post);
  //$post->delete();
  
    if($post->trashed()) {
      
       // $post->deleteImage(); 
        
         $post->forceDelete();
     }

     else{
         $post->delete();
     }

        session()->flash('success','Post deleted successfully.');
        return redirect(route('posts.index'));
        
    }
 /**
     *display the list of all trashed posts
     *
     * 
     * @return \Illuminate\Http\Response
     */
 

    public function trashed(){
   
      // $trashed=Post::withTrashed()->get(); 
      
       $trashed=Post::onlyTrashed()->get(); 
       //dd($trashed);

       return view('posts.index')->with('posts', $trashed);
       //return view('posts.index')->withPosts($trashed);
    //both are same in the laravel trash function
    }
  
  public function restore($id){

    $post = Post::withTrashed()->where('id',$id)->firstOrFail();  
   // dd($post); 
      $post->restore();

      session()->flash('success','Post restore successfully.');
       return redirect()->back();  
  }
}

<?php

namespace App\Http\Controllers;
use App\Tag;
use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagsRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //dd(Category::first()->where('published_at'));
       //dd(Category::first()->posts);
        return view('tags.index')->with('tags',Tag::all());//c->C if any error
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('tags.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */  
    public function store(CreateTagRequest $request)
    {
    
        /*   $this->validate($request,[
          'name'=>'required|unique:categories'    //we are not using this we make it request type
       ]); */ 

 Tag::create([
 'name'=>$request->name
  ]);
      session()->flash('success','Tag created successfully.');
       return redirect(route('tags.index'));
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
    public function edit(Tag $tag)
    {
        return view('tags.create')->with('tag',$tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagsRequest $request,Tag $tag)
    {
        /*
        $category->name = $request->name;
        $category->save();*/
        /*  this  is the other method to update the data  */

        $tag->update([
   'name' => $request->name
        ]);
        
        
        session()->flash('success','Tag updated successfully.');
        
        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if($tag->posts->count()>0){
            session()->flash('error','Tag cannot be deleted because it is associated to some post.'); 
            return redirect()->back();
        }
        
        $tag->delete();

        session()->flash('success','Tag deleted successfully.');

        return redirect(route('tags.index'));
    }
}

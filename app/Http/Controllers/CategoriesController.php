<?php
namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoriesRequest;

class CategoriesController extends Controller
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

       //with('categories',Category::all()) is used to fetch all the data from the databases
        return view('categories.index')->with('categories',Category::all());//here Category is model
       // return view('categories.index')->with('categories',Category::where('id','2')->get());

       /*
         where condition use for fetch some particular data
       */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('categories.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */  
    public function store(CreateCategoryRequest $request)
    {
        /*
         hear wwe use createcategoryrequest it define valdation of form in request folder
        */
    
        /*   $this->validate($request,[
          'name'=>'required|unique:categories'    //we are not using this we make it request type
       ]); */ 

     Category::create([ //here the all data is send to Category model 
     'name'=>$request->name
     ]);
    
      session()->flash('success','Category created successfully.');
       return redirect(route('categories.index'));
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
    public function edit(Category $category) //here the value of $category is come from the index.blade.php as category id;
    {
    /*  hear no need to pass the id laraval automatic pass the id from the route list  */
        
        return view('categories.create')->with('cat',$category);
    /*value of category store in cat variable and it is used to fetch the data from the database and show data on the create.blade.php
    page*/

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriesRequest $request,Category $category)
    {
        /*
        $category->name = $request->name;
        $category->save();*/
        /*  this  is the other method to update the data  */

        $category->update([
       
            'name' => $request->name
       
       ]);
        
        
        session()->flash('success','Category updated successfully.');
        
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Category $category)
    {
        if($category->posts->count() > 0){
            session()->flash('error','Category cannot be deleted because it have some post.');
       
          return redirect()->back();
        }
        
        $category->delete();

        session()->flash('success','Category deleted successfully.');

        return redirect(route('categories.index'));
    }
}

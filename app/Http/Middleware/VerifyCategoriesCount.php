<?php

namespace App\Http\Middleware;

use App\Category;//this is use to define Category in line 22
use Closure;

class VerifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * 
     * @param  \Closure  $next
     * 
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      
        if (Category::all()->count() == 0){
            session()->flash('error','you need to add the categories to be able to create a post');
        
            return redirect(route('categories.create'));
        }

        return $next($request); //it is used to proceed the add if category exist;
    
    }
}

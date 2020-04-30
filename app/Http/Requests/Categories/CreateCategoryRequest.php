<?php
/*   wen use command for create the request 
php artisan make:request (  request_name)
*/
namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;  //we use to true for the authorization  of person
        return true;
    }
     

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
    
         'name'=>'required|unique:categories' //use to display the name is required
        
        ];
    }
}

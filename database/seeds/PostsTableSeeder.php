<?php
use App\Post;

use App\Category;

use App\Tag;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
         
            'name' =>'News'

        ]);

        $author1 = App\User::create([
          
          'name' => 'Devil',
          
          'email' => 'Devil@2580.com',
          
          'password' => Hash::make('password')
             

        ]);


        $author2 = App\User::create([
          
            'name' => 'vampire',
            
            'email' => 'vampire@2580.com',
            
            'password' => Hash::make('password')
               
  
          ]);
  

        $category2 = Category::create([
         
            'name' =>'Marketing'

        ]);

        $category3 = Category::create([
         
            'name' =>'Partnership'

        ]);

       
        $post1 = Post::create([

            'title' =>'We relocated our office to a new designed garage',
            
            'description' => 'dhbhf',
            
            'content' =>'safsdf',
     
            'category_id' =>$category1->id,

            'image' => 'storage/posts/1.jpg',

            'user_id' => $author1->id

        ]);

//in the below case no need to pass user_id
        $post2 = $author2->posts()->create([

            'title' =>'Top 5 brilliant content marketing strategies',
            
            'description' => 'dhbhf',
            
            'content' =>'safsdf',
     
            'category_id' =>$category2->id,

            'image' => 'storage/posts/2.jpg'  //image storage

        ]);

        $post3 = $author1->posts()->create([

            'title' =>'Best practices for minimalist design with example',
            
            'description' => 'dhbhf',
            
            'content' =>'safsdf',
     
            'category_id' =>$category3->id,

            'image' => 'storage/posts/3.jpg'

        ]);

        $post4 = $author2->posts()->create([

            'title' =>'Congratulate and thank to Maryam for joining our team',
            
            'description' => 'dhbhf',
            
            'content' =>'safsdf',
     
            'category_id' => $category2->id,

            'image' => 'storage/posts/4.jpg'//

        ]);

        $tag1 = Tag::create([
         
            'name' =>'job'

        ]);


        $tag2 = Tag::create([
         
            'name' =>'customers'

        ]);

        $tag3 = Tag::create([
         
            'name' =>'record'

        ]);

        $post1->tags()->attach([$tag1->id,$tag2->id]);
        
        $post1->tags()->attach([$tag2->id,$tag3->id]);
        
        $post3->tags()->attach([$tag1->id,$tag3->id]);

    }
}

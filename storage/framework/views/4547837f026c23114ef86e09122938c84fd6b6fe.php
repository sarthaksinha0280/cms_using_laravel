index.blade.php/categories
<?php $__env->startSection('content'); ?> <!-- this content is display in the app.balde.php in the place yield('content') -->
<div class="d-flex justify-content-end mb-2">

<a href="<?php echo e(route('categories.create')); ?>" class="btn btn-success">Add Category</a>
<!--  hear we write  route('categories.create') because first of all route() check the name of URL from the route list and it automatically update the name -->
</div>

<div class="card card-info ">
<div class="card-header">Categories</div>
 <div class="card-body">
 <?php if($categories->count()>0): ?>
 <table class="table">
 <thead>
 <th>Name</th>
 <th>Posts count</th>
 <th></th>
 </thead>

 <tbody>
 <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 <tr>
 <td>
 <?php echo e($category->name); ?>

 </td>
 <td>
 <?php echo e($category->posts->count()); ?> <!-- hear post is define from the Category model    -->
 </td>
<td>

<a href="<?php echo e(route('categories.edit',$category->id)); ?>" class="btn btn-info btn-sm">
Edit
</a>

<!--  Delete button  -->

<button class="btn btn-danger btn-sm" onclick="handleDelete(<?php echo e($category->id); ?>)">Delete</button>

<!-- handleDelete is the javascript function to delete data form database -->
</td>
 </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
 </tbody>
 </table>  
 

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  
  <form action="" method="POST" id="deleteCategoryForm">
  
  <?php echo csrf_field(); ?> <!--  this is the security token -->
  
  <?php echo method_field('DELETE'); ?>
    <div class="container">
     <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center text-bold">
        Are you sure you to delete this category ?
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
      </div>
      </div>
    </div>
    </form>
  </div>
</div>
<?php else: ?>
<h3 class="text-center">No category yet</h3>
<?php endif; ?>
 </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
// function to handle the delete 
function handleDelete(id){

var form = document.getElementById('deleteCategoryForm')

form.action = '/categories/' + id

//console.log('deleting.',form)

$('#deleteModal').modal('show') //jquery

}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sarthaksinha/cms/resources/views/categories/index.blade.php ENDPATH**/ ?>
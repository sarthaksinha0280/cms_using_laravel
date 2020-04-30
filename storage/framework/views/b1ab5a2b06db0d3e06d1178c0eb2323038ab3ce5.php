<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-end mb-2">
<a href="<?php echo e(route('posts.create')); ?>" class="btn btn-success">Add Post</a>
</div>
 
<div class="card card-default">
<div class="card-header">Posts</div>

<div class="card-body">
<?php if($posts->count()>0): ?>
<table class="table">

<thead>
<th>Image</th>
<th>Title</th>
<th>Category</th>
<th>Button edit</th>
<th>Button trash</th>
</thead>
<tbody>

<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>  

<td>
  
<img src="<?php echo e(asset('storage/'.$post->image)); ?>" width="120px" height="60px" alt="">

</td>

<td> 
<?php echo e($post->title); ?>

</td>

<td>

<a href="<?php echo e(route('categories.edit',$post->category->id)); ?>">
   <?php echo e($post->category->name); ?>  <!--hear the category define in the Post model-->
</a>
</td>

<?php if($post->trashed()): ?>
<td>
<form action="<?php echo e(route('restore-posts',$post->id)); ?>" method="POST">
<?php echo csrf_field(); ?>
<?php echo method_field('PUT'); ?>

   <button type="submit" class="btn btn-info btn-sm">Restore</button>
</form>
</td>
<?php else: ?>
<td>
<a href="<?php echo e(route('posts.edit',$post->id)); ?>" class="btn btn-info btn-sm">Edit</a>
</td>
<?php endif; ?>

<td>
<form action="<?php echo e(route('posts.destroy',$post->id)); ?>" method="POST">
<?php echo csrf_field(); ?>
<?php echo method_field('DELETE'); ?>
<button type="submit" class="btn btn-danger btn-sm">
<?php echo e($post -> trashed() ? 'Delete' : 'Trash'); ?>

</button>
</form>
</td>

</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>    
  </table>
  <?php else: ?>
<h3 class="text-center">No post yet</h3>
  <?php endif; ?>
</div>

</div>

<?php $__env->stopSection(); ?>     
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sarthaksinha/cms/resources/views/posts/index.blade.php ENDPATH**/ ?>
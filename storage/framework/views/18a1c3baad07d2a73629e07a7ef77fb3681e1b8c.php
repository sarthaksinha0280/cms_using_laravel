create.blade.php/categories
<!-- this is used for include the file from the app.blade -->

<?php $__env->startSection('content'); ?>
<div class="card card-default">
<div class="card-header">
<?php echo e(isset($cat) ? 'Edit Category' : 'Create category'); ?>

</div>
<div class="card body">

<?php echo $__env->make('partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <!--show the error-->

<form action="<?php echo e(isset($cat) ? route('categories.update',$cat->id):route('categories.store')); ?>" method="POST">
<?php echo csrf_field(); ?>
<?php if(isset($cat)): ?>
<?php echo method_field('PUT'); ?>
<?php endif; ?>
<div class="form-group">
<label for="name">Name</label>
<input type="text" id="name" class="form-control" name="name" value="<?php echo e(isset($cat) ? $cat->name : ''); ?>">     
</div>

<div class="form-group">
<button class="btn btn-success">
<?php echo e(isset($cat) ? 'Update category' : 'Add category'); ?>

</button>
</div>

</form>

</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sarthaksinha/cms/resources/views/categories/create.blade.php ENDPATH**/ ?>
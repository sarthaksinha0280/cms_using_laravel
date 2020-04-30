<?php if($errors->any()): ?>
<div class="alert alert-danger">
<ul class="list-group">
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li class="list-group-item text-danger">
<?php echo e($error); ?>

</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
</div>
<?php endif; ?>
<?php /**PATH /Users/sarthaksinha/cms/resources/views/partials/errors.blade.php ENDPATH**/ ?>
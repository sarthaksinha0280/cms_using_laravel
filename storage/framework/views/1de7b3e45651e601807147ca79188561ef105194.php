<?php $__env->startSection('title'); ?>

<?php echo e($post->title); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('header'); ?>



  <header class="header text-white h-fullscreen pb-80" style="background-image: url( <?php echo e(asset('storage/'.$post->image)); ?>);" data-overlay="9">
      <div class="container text-center">        

        <div class="row h-100">
          <div class="col-lg-8 mx-auto align-self-center">

            <p class="opacity-70 text-uppercase small ls-1">

             <?php echo e($post->category->name); ?>


            </p>

            <h1 class="display-4 mt-7 mb-8"><?php echo e($post->title); ?></h1>
            
            <p><span class="opacity-70 mr-1">By</span> <a class="text-white" href="#">

              <?php echo e($post->user->name); ?>

             
            </a></p>
            
            <p><img class="avatar avatar-sm" src="<?php echo e(Gravatar::src($post->user->email)); ?>" alt="..."></p>

          </div>

          <div class="col-12 align-self-end text-center">
            <a class="scroll-down-1 scroll-down-white" href="#section-content"><span></span></a>
          </div>

        </div>

      </div>
    </header><!-- /.header -->


<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<main class="main-content">


<!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Blog content
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->
<div class="section" id="section-content">
  <div class="container">

  

<?php echo $post->content; ?> <!-- we use this bcz to ignore the html-->

   
     <div class="row">

        <div class="gap-xy-2 mt-6">
         
         <?php $__currentLoopData = $post->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <a class="badge badge-pill badge-secondary" href="#">

      <?php echo e($tag->name); ?>


        </a>

         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
        
       </div>

      </div>
    </div>


  </div>
</div>



<!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Comments
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->
<div class="section bg-gray">
  <div class="container">

   

  </div>
</div>



</main>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/sarthaksinha/cms/resources/views/blog/show.blade.php ENDPATH**/ ?>
<div class="col-md-4 col-xl-3">
              <div class="sidebar px-4 py-md-0">
<!--search-->
                <h6 class="sidebar-title">Search</h6>


                <form class="input-group" action=" " method="GET">
                  <input type="text" class="form-control" name="search" placeholder="Search" value=" <?php echo e(request()->query('search')); ?> ">      
                  <div class="input-group-addon">
                    <span class="input-group-text"><i class="ti-search"></i></span>
                  </div>
                </form>

                <hr>

                <h6 class="sidebar-title">Categories</h6>
                <div class="row link-color-default fs-14 lh-24">
                 <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-6">
                    <a href="<?php echo e(route('blog.category',$category->id)); ?>">
                  
                    <?php echo e($category->name); ?>

                
                    </a>
                </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <hr>

            <!--      <h6 class="sidebar-title">Top posts</h6>
                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="../assets/img/thumb/4.jpg">
                  <p class="media-body small-2 lh-4 mb-0">Thank to Maryam for joining our team</p>
                </a>

                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="../assets/img/thumb/3.jpg">
                  <p class="media-body small-2 lh-4 mb-0">Best practices for minimalist design</p>
                </a>

                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="../assets/img/thumb/5.jpg">
                  <p class="media-body small-2 lh-4 mb-0">New published books for product designers</p>
                </a>

                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="../assets/img/thumb/2.jpg">
                  <p class="media-body small-2 lh-4 mb-0">Top 5 brilliant content marketing strategies</p>
                </a>
-->
                <hr>

                <h6 class="sidebar-title">Tags</h6>
                <div class="gap-multiline-items-1">
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 
                  <a class="badge badge-secondary" href="<?php echo e(route('blog.tag',$tag->id)); ?>">  
                    
                     <?php echo e($tag->name); ?>

                     
                     </a>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 
                </div>

               

              </div>
            </div><?php /**PATH /Users/sarthaksinha/cms/resources/views/partials/sidebar.blade.php ENDPATH**/ ?>
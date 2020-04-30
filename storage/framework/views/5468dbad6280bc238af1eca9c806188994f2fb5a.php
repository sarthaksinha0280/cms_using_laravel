<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>
</head>
<br>
app.blade.php
<body style="background-color:lightyellow">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                            </li>
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                 
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                <a class="dropdown-item" href="<?php echo e(route('users.edit-profile')); ?>">
                                      
                                      My profile
                                     </a>
 

                                  
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                 
                                   


                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
      
        <?php if(auth()->guard()->check()): ?> <!-- if user is authenticated then page is login -->
  
  <div class="container">
  
  <?php if(session()->has('success')): ?>
<div class="alert alert-success">
<?php echo e(session()->get('success')); ?>

</div>
 <?php endif; ?>

<?php if(session()->has('error')): ?>
<div class="alert alert-danger">
<?php echo e(session()->get('error')); ?>

</div>
        <?php endif; ?>
  
  <div class="row">
  <div class="col-md-4">
  <ul class="list-group">


<!-- for users only     -->
<?php if(auth()->user()->isAdmin()): ?>

<li class="list-group-item">
  <a href="<?php echo e(route('users.index')); ?>">
  
  Users
  
  </a>
  
  </li>

<?php endif; ?>



  <li class="list-group-item bg-dark">
  <a href="<?php echo e(route('posts.index')); ?>" style="color:white">Posts</a>
  </li>

  <li class="list-group-item bg-dark">
  <a href="<?php echo e(route('tags.index')); ?>" style="color:white">Tags</a>
  </li>
  
  <!--  here we check the index in the route   -->
  <li class="list-group-item bg-dark">
  <a href="<?php echo e(route('categories.index')); ?>" style="color:white">Categories</a>
  </li>
  </ul>
  
  <ul class="list-group mt-5">
  <li class="list-group-item bg-dark">
  
  <a href="<?php echo e(route('trashed-posts.index')); ?>" style="color:white">Trash Posts</a>  
  
  </li>
  </ul>
  
  </div>
  
  
  <div class="col-md-8">
  <?php echo $__env->yieldContent('content'); ?> <!-- this show the content of selected route form the above list   -->
  </div>
  </div>  
  </div> 
  
  <?php else: ?><!-- else user is not authenticated then only show content-->
  
  <?php echo $__env->yieldContent('content'); ?><!--this show the login and regsiter page in the application   -->
 
  <?php endif; ?>
        </main>
    </div>
    <!-- this file is not need to include bcz laravel provide all os these
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"  crossorigin="anonymous"></script>
 -->
  <!-- Scripts -->
 <!-- <script src="<?php echo e(asset('js/app.js')); ?>" defer></script> hear defer is block the code to link with file -->
  <!-- Scripts -->
  <script src="<?php echo e(asset('js/app.js')); ?>"></script>
 <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH /Users/sarthaksinha/cms/resources/views/layouts/app.blade.php ENDPATH**/ ?>
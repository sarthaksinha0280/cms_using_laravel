<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>

      <?php echo $__env->yieldContent('title'); ?>

    </title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/page.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="<?php echo e(asset('img/apple-touch-icon.png')); ?>">
    <link rel="icon" href="<?php echo e(asset('img/favicon.png')); ?>">
  </head>

  <body>
  <br>
   blog.blade.php

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="<?php echo e(route('welcome')); ?>">
            <img class="logo-dark" src="<?php echo e(asset('img/logo-dark.png')); ?>" alt="logo">
            <img class="logo-light" src="<?php echo e(asset('img/logo-light.png')); ?>" alt="logo">
          </a>
        </div>

        <section class="navbar-mobile">
          <span class="navbar-divider d-mobile-none"></span>
   <ul class="nav nav-navbar">
          
          </ul>
        </section>

        <a class="btn btn-xs btn-round btn-success" href="<?php echo e(route('login')); ?>">Login (blog.blad.php)</a>

      </div>
    </nav>


    
    <?php echo $__env->yieldContent('header'); ?>

   
   
   <?php echo $__env->yieldContent('content'); ?>

    <!-- Footer -->
      <footer class="footer">
      <div class="container">
        <div class="row gap-y align-items-center">

          <div class="col-6 col-lg-3">
            <a href="/"><img src="<?php echo e(asset('img/logo-dark.png')); ?>" alt="logo"></a>
          </div>

          <div class="col-6 col-lg-3 text-right order-lg-last">
            <div class="social">
              <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
              <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
              <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
            </div>
          </div>

           

        </div>
      </div>
    </footer>
      <!-- /.footer -->


    <!-- Scripts -->
    <script src="<?php echo e(asset('js/page.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>

  </body>
</html>
<?php /**PATH /Users/sarthaksinha/cms/resources/views/layouts/blog.blade.php ENDPATH**/ ?>
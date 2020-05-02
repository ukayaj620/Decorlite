<link rel="stylesheet" href="<?php echo base_url('css/header.css'); ?>">

<nav class="navbar navbar-expand-lg navbar-light mr-auto bg-custom-color">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">
    <h1 class="display-6 fg-custom-color"> DECORLITE </h1>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item mx-2">
        <a class="nav-link fg-custom-color" href="<?php echo base_url(); ?>">HOME</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link fg-custom-color" href="<?php echo base_url('page/about'); ?>">ABOUT</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link fg-custom-color" href="<?php echo base_url('page/contact'); ?>">CONTACT</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link fg-custom-color" href="<?php echo base_url('page/contact'); ?>">CART</a>
      </li>
      <li class="nav-item mx-2">
        <a href="<?php echo base_url('page/signin'); ?>" class="btn btn-custom-color d-none d-lg-block">SIGN IN</a>
        <a class="nav-link d-lg-none fg-custom-color" href="<?php echo base_url('page/signin'); ?>">SIGN IN</a>
      </li>
      <li class="nav-item mx-2">
        <a href="<?php echo base_url('page/signup'); ?>" class="btn btn-custom-color d-none d-lg-block">SIGN UP</a>
        <a class="nav-link d-lg-none fg-custom-color" href="<?php echo base_url('page/signup'); ?>">SIGN UP</a>
      </li>
    </ul>
  </div>
</nav>
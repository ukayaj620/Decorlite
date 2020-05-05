<link rel="stylesheet" href="<?php echo base_url('css/header.css'); ?>">

<nav class="navbar navbar-expand-lg navbar-light mr-auto bg-custom-color">
	<a class="navbar-brand ml-md-5" href="<?php echo base_url('user/home'); ?>">
		<img src="<?php echo site_url('img/logo.png') ?>" class="mr-1" width="50px" height="50px">
		<h2 class="d-inline-block align-middle mb-0 fg-custom-color"> DECORLITE </h2>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse mr-md-5" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item mx-2">
				<a class="nav-link fg-custom-color" href="<?php echo base_url('user/home'); ?>">HOME</a>
			</li>
			<li class="nav-item mx-2">
				<a class="nav-link fg-custom-color" href="<?= base_url('user/cart') ?>">
					CART <?php if($this->session->flashdata('item_add_to_cart') == TRUE): ?><span class="badge badge-light">new</span><?php endif; ?>
				</a>
			</li>
			<li class="nav-item mx-2">
				<a class="nav-link fg-custom-color" href="<?= base_url('history/historyList') ?>">HISTORY</a>
			</li>
			<li class="nav-item mx-2">
				<button type="button" class="btn btn-warning d-none d-lg-block">
					<span class="badge badge-light">Hi</span> <?= $name ?>
				</button>
			</li>
			<li class="nav-item mx-2">
				<a href="<?php echo base_url('auth/signout'); ?>" class="btn btn-custom-color d-none d-lg-block">SIGN OUT</a>
				<a class="nav-link d-lg-none fg-custom-color" href="<?php echo base_url('auth/signout'); ?>">SIGN OUT</a>
			</li>
		</ul>
	</div>
</nav>

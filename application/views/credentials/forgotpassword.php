<link rel="stylesheet" href="<?php echo base_url('css/credentials.css'); ?>">

<div class="container-fluid">
	<form class="custom-container" action="<?php echo base_url('auth/forgotpassword'); ?>" method="POST">
		<h1 class="inner-container display-6"> Forget Password </h1>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="text" name="email" class="form-control" id="email" placeholder="Email">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" name="password" class="form-control" id="password" placeholder="password">
		</div>
		<div class="form-group">
			<label for="password">Confirm Password</label>
			<input type="password" name="confirmpassword" class="form-control" id="password" placeholder="confirm password">
		</div>
		<div class="form-group">
			<button type="submit" class="btn-custom">Sign In</button>
		</div>
	</form>
</div>

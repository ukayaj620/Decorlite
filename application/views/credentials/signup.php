<link rel="stylesheet" href="<?php echo base_url('css/credentials.css'); ?>">

<div class="container-fluid">
    <form class="custom-container" action="<?php echo base_url('auth/signup')?>" method="POST" >
        <h1 class="inner-container display-6"> Let's Sign up! </h1>
		<div class="form-group">
			<label for="name">Name</label>
			<input name="name" type="text" class="form-control" id="name" placeholder="name">
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input name="email" type="text" class="form-control" id="email" placeholder="email">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input name="password" type="password" class="form-control" id="password" placeholder="password">
		</div>
		<div class="form-group">
			<label for="confirmPassword">Confirm Password</label>
			<input name="confirmPassword" type="password" class="form-control" id="confirmPassword" placeholder="confirm password">
		</div>
		<div class="form-group">
			<button type="submit" class="btn-custom">Sign In</button>
		</div>
    </form>
</div>

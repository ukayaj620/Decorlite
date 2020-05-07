<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UBM Dashboard Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('css/sb-admin-2.css');?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">ADMIN SIGN-IN </h1>
                  </div>
                  <form class="admin" name="frmLogin" action="<?php echo base_url('admin/login/submit_login');?>" method="post">
                    <div class="form-group">
                 <input type="text" class="form-control form-control-user" name="admin_id" id="admin_id"  placeholder="Enter Admin ID..." required value="<?php if (isset($_COOKIE['loginAdminId'])) { echo $_COOKIE['loginAdminId']; }?>">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" required id="admin_password"  name="admin_password" placeholder="Enter Admin Password..." value="<?php if (isset($_COOKIE['loginAdminPassword'])) { echo $_COOKIE['loginAdminPassword']; }?>">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                   <input type="checkbox" class="custom-control-input" id="RememberCheck" name="RememberCheck" <?php if (isset($_COOKIE['loginUserId'])) {echo "checked='checked'";}?>">
                        <label class="custom-control-label" for="RememberCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-danger btn-user btn-block">
                      Login 
                    </button>
                            
                   
                  </form>
                  <hr>
				  
				
                  <div class="text-center">
                    <a class="small" href="#"><?php echo $err;?></a>
                  </div>
               
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('vendor/jquery/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('vendor/jquery-easing/jquery.easing.min.js');?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('js/sb-admin-2.min.js');?>"></script>

</body>

</html>

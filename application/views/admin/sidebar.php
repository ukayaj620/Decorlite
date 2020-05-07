 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/home');?>">
        <div class="sidebar-brand-icon ">
        <!-- <i class="fas fa-laugh-wink"></i>-->
		
		<img src="<?php echo base_url('img/logo.png');?>" class="img-fluid">
        </div>
        <div class="sidebar-brand-text text-dark mx-3"><h7>DECORLITE</h7></div>
      </a>
      <hr class="sidebar-divider my-0">
      <hr class="sidebar-divider">
      <div class="sidebar-heading text-dark">
        List Tabel
      </div>
      <hr class="sidebar-divider">
	 <?php foreach($resulthasil as $rows){ ?>

			  <li class="nav-item">
			 
        <a class="nav-link text-dark" href="<?php echo site_url("/admin/tabel/list/".$rows);?>">

				  <i class="<?php echo $rows;?>"></i>
				  <span><?php echo $rows?></span></a>
			  </li>
	  
	  <?php } ?>
      <hr class="sidebar-divider d-none d-md-block">

    </ul>


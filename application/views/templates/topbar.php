<header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.html"><img src="<?php echo base_url() ?>assets/img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <?php $uriMethod_name=$this->router->fetch_method(); ?>

      <!-- Nav Item - Dashboard -->
             <li <?php 
             if($uriMethod_name=="index"  || $uriMethod_name=="detail"){
              echo "class='nav-item active'";
               }else{
              echo "class='nav-item'" ; } 
               ?> >
              <a class="nav-link" href="<?= base_url('user/index'); ?>">Buku</a></li>

             <li <?php 
             if($uriMethod_name=="profil"){
              echo "class='nav-item active'";
               }else{
              echo "class='nav-item'" ; } 
               ?> ><a class="nav-link" href="<?= base_url('user/profil'); ?>">Profil</a></li>

              <li <?php 
             if($uriMethod_name=="edit"){
              echo "class='nav-item active'";
               }else{
              echo "class='nav-item'" ; } 
               ?> ><a class="nav-link" href="<?= base_url('user/edit'); ?>">Change Profil</a></li>

              <li <?php 
             if($uriMethod_name=="changepassword"){
              echo "class='nav-item active'";
               }else{
              echo "class='nav-item'" ; } 
               ?> ><a class="nav-link" href="<?= base_url('user/changepassword'); ?>">Change Password</a></li>
            </ul>

             <ul class="nav-shop">
              

             <?php
                    if (!empty($this->session->userdata('email'))) { ?>
                  <li class="nav-item"><a href="<?= base_url('booking'); ?>"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle"><?= $this->ModelBooking->getDataWhere('temp', ['email_user' => $this->session->userdata('email')])->num_rows(); ?></span></button></a> </li>

                   
                    <?php } else { ?>

            
                    <?php } ?>

           
            
                <li class="nav-item"><a class="button button-header" href="#"><?= $user['name']; ?></a></li>

              <a href="<?= base_url('auth/logout'); ?>"><button type="submit" value="submit" class="button button-login"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</button></a>

            
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
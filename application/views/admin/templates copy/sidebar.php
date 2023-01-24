<body id="page-top">

  <!-- Page Wrapper -->
  
      <div class="header">
      
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="<?php echo base_url();?>">Makanan Khas Lampung</a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('kategori/pie');?>">Pie <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('kategori/keripik');?>">Keripik</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('kategori/bakso_kemasan');?>">Bakso Kemasan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('kategori/sambal');?>">Sambal</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('kategori/tanpa_kategori');?>">Tanpa Katgori</a>
      </li>
    </ul>
    
    <?php echo form_open('welcome/cari');?>
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" name="katakunci" placeholder="Ketik yang anda cari..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-warning" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
              
            </div>
          </form>
  
  </div>

        
        
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <!-- Melemparkan form cari ke kontroler welcome  -->
          
        <?php echo form_close();?>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

        
  <div class="navbar">
    <ul class="nav navbar-nav navbar-right ">
      <li>
        
        <?php 
          $keranjang='<i class="fas fa-shopping-cart text-success"></i> : '.$this->cart->total_items().' Items';
          echo anchor('dashboard/detail_keranjang', $keranjang);  
        ?>
       
      </li>
    </ul>
    <div class="topbar-divider d-none d-sm-block"></div>

            <ul class="nav navbar-nav navbar-right">
              <?php if($this->session->userdata('username')){;?>
              <li>
                <div>Selamat Datang : <?php echo $this->session->userdata('username');?></div>
              </li>
              
              <li>
                <?php echo anchor('auth/logout_user','<i class="fa fa-sign-out-alt ml-2"></i> Logout');?>
              </li>
                <?php }else{ ;?>
                  <li>
                    <?php echo anchor('auth/login','<i class="fa fa-user text-secondary mr-2"></i>Login');?>
                  </li>
                  <?php } ;?>
            </ul>
  </div>
          

            

          </ul>

        </nav>
        <!-- End of Topbar -->
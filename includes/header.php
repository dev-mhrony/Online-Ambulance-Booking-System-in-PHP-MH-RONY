 <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex align-items-center justify-content-center justify-content-md-between">
       <?php 
 $query=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
 while ($row=mysqli_fetch_array($query)) {


 ?>
      <div class="align-items-center d-none d-md-flex">
        <i class="bx bx-envelope"></i> Email:  <?php  echo $row['Email'];?>
      </div>
      <div class="d-flex align-items-center">
        <i class="bi bi-phone"></i> Call us now +<?php  echo $row['MobileNumber'];?>
      </div><?php } ?>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.php" class="logo me-auto"><img src="assets/img/logo.png" alt="">EAHP</a>
    
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="index.php#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
           <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="admin/login.php">Admin</a></li>
          <li><a class="nav-link scrollto" style="color: red;" href="ambulance-tracking.php">Ambulance Tracking</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Hire an</span> Ambulance</a>

    </div>
  </header><!-- End Header -->
<div id="preloader"> <i class="circle-preloader"></i> <img src="img/core-img/salad.png" alt=""> </div> 
<header class="header-area"> 
<?php include("Connections\cn.php");?>
    <!-- Top Header Area -->
  <div class="top-header-area">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-between"> 
        
        <div class="col-12 col-sm-6">
          <div class="breaking-news"> 
            </div>
        </div>
        
        <!-- Top Social Info -->
        <div class="col-12 col-sm-6 ">
          <div class="top-social-info text-right">
          <a href="login.php"><i>Login </i></a>
          <a href="register.php"><i>Register</i></a>
            <a href="https://www.facebook.com/profile.php?id=100031270283472"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="https://www.instagram.com/gurunanak.restaurant/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Navbar Area -->
  <div class="delicious-main-menu">
    <div class="classy-nav-container breakpoint-off">
      <div class="container"> 
        <!-- Menu -->
        <nav class="classy-navbar justify-content-between" id="deliciousNav"> 
          
          <!-- Logo --> 
          <a class="nav-brand" href="index.php"><img src="img/core-img/logo.PNG" alt=""></a> 
          
          <!-- Navbar Toggler -->
          <div class="classy-navbar-toggler"> <span class="navbarToggler"><span></span><span></span><span></span></span> </div>
          
          <!-- Menu -->
          <div class="classy-menu"> 
            
            <!-- close btn -->
            <div class="classycloseIcon">
              <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
            </div>
            
            <!-- Nav Start -->
            <div class="classynav">
              <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
              
                <li>
                <a class="dropdown-toggle" data-toggle="dropdown" href="foodmenu.php">Food Menu </a>
                <div class="dropdown-menu" style="min-width:0 !importantion ">
         <?php
         
           $query="SELECT * FROM store_categories";
           $result = $cn->query($query);
          
          
           while($q = $result->fetch_assoc()){ ?>
            <a href="menu_list.php?c=<?php echo $q['c_name'] ?>"> 
           <?php echo $q["c_name"];?>
            </a>
           <?php }
         ?>
                 </div>
                </li>
                
                
                <li><a href="contact.php">Contact</a></li>
              </ul>          
            </div>
            <!-- Nav End --> 
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>
<!-- ##### Header Area End ##### -->
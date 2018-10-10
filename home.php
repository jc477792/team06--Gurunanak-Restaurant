<?php include("Connections/cn.php");
session_start();
$email = $_SESSION['email'];

$rr=@mysql_query("select * from customers where username='".$email."'");
$rl=@mysql_fetch_assoc($rr);
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Guru Nanak Restaurant</title>
<link rel="icon" href="img/core-img/favicon.ico">
<link rel="stylesheet" href="style.css">
</head>

<body>
<div id="preloader"> <i class="circle-preloader"></i> <img src="img/core-img/salad.png" alt=""> </div>
<header class="header-area"> 
  
  
  <div class="top-header-area">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-between"> 
        
        <div class="col-12 col-sm-6">
          <div class="breaking-news"> 
             
          </div>
        </div>
        
        
        <div class="col-12 col-sm-6">
          <div class="top-social-info text-right"> <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
        </div>
      </div>
    </div>
  </div>
  
  
  <div class="delicious-main-menu">
    <div class="classy-nav-container breakpoint-off">
      <div class="container"> 
        <!-- Menu -->
        <nav class="classy-navbar justify-content-between" id="deliciousNav"> 
          
          <!-- Logo --> 
          <a class="nav-brand" href="index.php"><img src="img/core-img/logo.png" alt=""></a> 
          
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
                <li class="active"><a href="home.php">Home</a></li>
                <li><a href="">Food Menu </a> 
                <?php include("Connections/cn.php");
					  $rrw=@mysql_query("select * from store_categories order by c_id desc");
                ?>
                                      <ul class="dropdown">
                                          <?php while($rlw=mysql_fetch_assoc($rrw)){?>
                                            <li><a href="food_menu1.php?id=<?php echo $rlw['c_name'];?>"><?php echo $rlw['c_name'];?></a></li>
                                           <?php }?>
                                            
                                        </ul>
                
                </li>
                
                <li><a href="logout.php">Logout</a></li>
              </ul>
            </div>
            <!-- Nav End --> 
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>
<!-- Header End  -->
<marquee>
<h1 style="color:#F00;">Welcome <?php echo $rl['fname'];?></h1>
</marquee>
<section class="hero-area">
  <div class="hero-slides owl-carousel"> 
    
    <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/bg1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="hero-slides-content" data-animation="fadeInDown" data-delay="100ms">
                                <h2 data-animation="fadeInDown" data-delay="300ms">Delicious Punjabi Food</h2>
                                <p data-animation="fadeInDown" data-delay="700ms">Punjabi cuisine is a culinary style originating in the punjab, a region in the northern part of the Indian subcontinent. Punjabi food is well known for its enriched flavours of the milk products like paneer, mawa, whitebutter. Main dishes are "Sarso ka Saag" and "Maki di Roti", Chhole bhature, Malai kofta, Punjabi kadi and so many variety of creative dishes.</p>
                                 </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/bg6.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="hero-slides-content" data-animation="fadeInDown" data-delay="100ms">
                                <h2 data-animation="fadeInDown" data-delay="300ms">Delicious Punjabi Food</h2>
                                <p data-animation="fadeInDown" data-delay="700ms">Punjabi cuisine is a culinary style originating in the punjab, a region in the northern part of the Indian subcontinent. Punjabi food is well known for its enriched flavours of the milk products like paneer, mawa, whitebutter. Main dishes are "Sarso ka Saag" and "Maki di Roti", Chhole bhature, Malai kofta, Punjabi kadi and so many variety of creative dishes.</P>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="single-hero-slide bg-img" style="background-image: url(img/bg-img/bg7.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="hero-slides-content" data-animation="fadeInUp" data-delay="100ms">
                                <h2 data-animation="fadeInUp" data-delay="300ms">Delicious Punjabi Food</h2>
                                <p data-animation="fadeInUp" data-delay="700ms">Punjabi cuisine is a culinary style originating in the punjab, a region in the northern part of the Indian subcontinent. Punjabi food is well known for its enriched flavours of the milk products like paneer, mawa, whitebutter. Main dishes are "Sarso ka Saag" and "Maki di Roti", Chhole bhature, Malai kofta, Punjabi kadi and so many variety of creative dishes.</P>
              <a href="#" class="btn delicious-btn" data-animation="fadeInUp" data-delay="1000ms">See Receipe</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<br><br>


<?php include("footer.php");?>
<script src="js/jquery/jquery-2.2.4.min.js"></script> 
<script src="js/bootstrap/popper.min.js"></script> 
<script src="js/bootstrap/bootstrap.min.js"></script> 
<script src="js/plugins/plugins.js"></script> 
<script src="js/active.js"></script> 


</body>
</html>
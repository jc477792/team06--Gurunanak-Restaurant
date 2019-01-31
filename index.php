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
  
   <?php include_once("header.php"); 
   
   $scoller="SELECT name,content,filename from tbl_offers where type=1";
   $fav="SELECT name,content,filename from tbl_offers where type=2";
   $dishes="SELECT name,content,filename from tbl_offers where type=3";
   
   ?>
  
    <!-- Slider -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <?php
               $result = $cn->query($scoller);
       
        if(isset($result)){
            while($row = $result->fetch_assoc()) {?>
            <div class="single-hero-slide bg-img" style="background-image: url('/gurunanak/admin/uploads/offer/<?php echo $row['filename']?>')" alt="<?php echo $row['name'] ?>">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                            <div class="hero-slides-content" data-animation="fadeInDown" data-delay="100ms">
                                <h2 data-animation="fadeInDown" data-delay="300ms"><?php echo $row['name']?></h2>
                                <p data-animation="fadeInDown" data-delay="700ms"><?php echo $row['content'] ?></p>
                                 </div>
                        </div>
                    </div>
                </div>
            </div>
<?php }
} ?>
            
          
            
            
        </div>
    </section>
    <!-- Slider End -->

    <!-- Catagory  -->
    <section class="top-catagory-area section-padding-80-0">
        <div class="container">
            <div class="row">
               
                <!-- Top Catagory Area -->
                <?php
                  $result = $cn->query($fav);
       
        if(isset($result)){
            while($row = $result->fetch_assoc()) {?>
                <div class="col-12 col-lg-6">
                    <div class="single-top-catagory">
                        <img src="/gurunanak/admin/uploads/offer/<?php echo $row['filename']?>" alt="<?php echo $row['name'] ?>">
                        <!-- Content -->
                        <div class="top-cta-content">
                            <h3><?php echo $row['name'];?></h3>
                            <h6><?php echo $row['content'];?></h6>
                            
                        </div>
                    </div>
                </div>
            
<?php }
} ?>
            
            </div>
        </div>
    </section>
    <!-- Catagory End  -->

    <!--  Best Dishes -->
    <section class="best-receipe-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>The best Dishes</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                  $result = $cn->query($dishes);
       
        if(isset($result)){
            while($row = $result->fetch_assoc()) {?>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-best-receipe-area mb-30">
                        <img src="/gurunanak/admin/uploads/offer/<?php echo $row['filename']?>" alt="<?php echo $row['name'] ?>">
                        <div class="receipe-content">
                            <span>
                                <h5><?php echo $row['name'];?></h5>
                            </a>
                            <div class="ratings">
                              <?php echo $row['content'];?>
                            </div>
                        </div>
                    </div>
                </div>

               
<?php }
} ?>
            

                
             
               
            </div>
        </div>
    </section>
    <!-- Best Dishes End ##### -->

    
 
   
    <!-- Follow Us Instagram  -->
    <div class="follow-us-instagram">
        
        <
        <div class="insta-feeds d-flex flex-wrap">
            
            <div class="single-insta-feeds">
                <img src="img/bg-img/bg1.jpg" alt="" style="height:193px;width:193px;">
                <!-- Instagram icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            
            <div class="single-insta-feeds">
                <img src="img/bg-img/bg2.jpg" alt="" style="height:193px;width:193px;">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            
            <div class="single-insta-feeds">
                <img src="img/bg-img/bg6.jpg" alt="" style="height:193px;width:193px;">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            
            <div class="single-insta-feeds">
                <img src="img/bg-img/r1.jpg" alt="" style="height:193px;width:193px;">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            <!-- Single Insta Feeds -->
            <div class="single-insta-feeds">
                <img src="img/bg-img/r4.jpg" alt="" style="height:193px;width:193px;">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            
            <div class="single-insta-feeds">
               <img src="img/bg-img/r3.jpg" alt="" style="height:193px;width:193px;">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>

            
            <div class="single-insta-feeds">
                <img src="img/bg-img/r2.jpg" alt="" style="height:193px;width:193px;">
                <!-- Icon -->
                <div class="insta-icon">
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!--  Instagram End ##### -->

    <!--  Footer  -->
    <?php include("footer.php");?>
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/plugins.js"></script>
    <script src="js/active.js"></script>


    
</body>
</html>
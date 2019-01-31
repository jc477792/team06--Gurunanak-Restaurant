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
   <?php include("header.php");
   
    include("Connections/cn.php");
if(isset($_SESSION['id'])){
      $scoller="SELECT name,content,filename from tbl_offers where type=1";
   ?>



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
                                <h2 data-animation="fadeInDown" data-delay="300ms">Delicious Punjabi Food</h2>
                                <p data-animation="fadeInDown" data-delay="700ms">Punjabi cuisine is a culinary style originating in the punjab, a region in the northern part of the Indian subcontinent. Punjabi food is well known for its enriched flavours of the milk products like paneer, mawa, whitebutter. Main dishes are "Sarso ka Saag" and "Maki di Roti", Chhole bhature, Malai kofta, Punjabi kadi and so many variety of creative dishes.</p>
                                 </div>
                        </div>
                    </div>
                </div>
            </div>
<?php }
} ?>
          
            
           
  </div>
</section>

<br><br>


<?php include("footer.php"); ?>
<script src="js/jquery/jquery-2.2.4.min.js"></script> 
<script src="js/bootstrap/popper.min.js"></script> 
<script src="js/bootstrap/bootstrap.min.js"></script> 
<script src="js/plugins/plugins.js"></script> 
<script src="js/active.js"></script> 


</body>
<?php }
else{
     header("location:login.php");
}
?>
</html>
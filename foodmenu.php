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
   
<?php include("header.php"); ?>
<?php include("connections/cn.php"); ?>

<section class="best-receipe-area" >
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-heading" style="background-color:#e9be8a;">
          <h3 style="color:#FFF;">Menu</h3>
        </div>
      </div>
    </div>
    <div class="row"> 
      <?php 
	  $rr=$cn->query("select * from store_categories order by c_id desc");
	  while($rl=mysqli_fetch_assoc($rr)) {?> 
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="single-best-receipe-area mb-30"> <a href="product.php?id=<?php echo $rl['c_name'];?>"><img src='admin/images/bg6.jpg'<?php echo $rl['c_description'];?>" style="height:304px;width:350px" alt="">
          <div class="receipe-content"> 
            <h5><b><?php echo $rl['c_name'];?></b></h5>
            
            </a>
            
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>


<?php include("footer.php");?>
<script src="js/jquery/jquery-2.2.4.min.js"></script> 
<script src="js/bootstrap/popper.min.js"></script> 
<script src="js/bootstrap/bootstrap.min.js"></script> 
<script src="js/plugins/plugins.js"></script> 
<script src="js/active.js"></script> 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script> 
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
</body>
</html>
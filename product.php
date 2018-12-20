<?php include("Connections/cn.php");?>
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

<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/bg7.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-text text-center">
                        <h2><?php echo @$_GET['id'];?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br><br>
<section class="best-receipe-area" >
  <div class="container">
   
   
    
    <div class="row"> 
      <?php 
	  $rr=@mysql_query("select * from menu where cat_id='".$_GET['id']."' order by pk_id desc"); // this is a select statement not insert 
	  while($rl=mysqli_fetch_assoc($rr)) {?>
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="single-best-receipe-area mb-30"> <img src="admin/images/<?php echo $rl['img'];?>" style="height:304px;width:350px" alt="">
          <div class="receipe-content"> 
            <h5><b>Name : <?php echo $rl['name'];?></b></h5>
            <h5><b>Price : <?php echo $rl['price'];?></b></h5> 
            <a href="login.php" class="btn btn-sm btn-success">Add Cart</a>
            
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
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
<?php if (isset($_REQUEST['c'])|| trim($str) != ''){

    $check=$_REQUEST['c'];
    include("header.php"); 
    ?>

    <!-- Catagory  -->
    <section class="top-catagory-area section-padding-80-0">
        <div class="container">
            <div class="row">
                <!-- Top Catagory Area -->
               
                <?php
         
         $query="SELECT * FROM store_categories where c_name='".$check."'";
         //echo print($query);

        
         $result = $cn->query($query);
       
        if(isset($result)){
    $q =$result->fetch_assoc();
     ?>
         <div class="col-12 col-lg-12">
          <div class="single-top-catagory">
              <?php if(isset($q['filename'])){?>
          <img src="/gurunanak/admin/uploads/cat/<?php echo $q['filename']?>" alt="<?php echo $q['c_name'] ?>">
              <?php } else{?>
          <img src="img/bg-img/bg1.jpg">
          <?php }?>
                        <!-- Content -->
                        
                        <div class="top-cta-content">
                            <h3> <?php echo $q['c_name'];?></h3>
                            <h6> <?php echo $q["c_description"];?></h6>
                            
                        </div>
                    </div>
                </div>
                </div>
        <?php }
        
       ?>
                
                <!-- Top Catagory Area -->
                
          
        </div>
    </section>
    <!-- Catagory End  -->

    <!--  Best Dishes -->
    <section class="best-receipe-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading">
                        <h3>Menu for <?php echo $q['c_name'];?></h3>
                    </div>
                </div>
            </div>

            <div class="row">
            <?php
         
         $query="SELECT * FROM menu where cat_id='".$check."'";
         //echo print($query);

        
         $result = $cn->query($query);
       
        if(isset($result)){
            while($row = $result->fetch_assoc()) {
     ?>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-best-receipe-area mb-30">
                       <?php if(isset($row['img'])){ ?>
                    <img src="/gurunanak/admin/uploads/menu/<?php echo $row['img']?>" alt="<?php echo $row['name'] ?>">
                    <?php }else{?>
                    <img src="img/bg-img/r6.jpg" alt="default">
                    <?php }?>
                            <a href="receipe-post.php">
                                <h4><?php echo $row['name']; ?></h4>
                                <h6><?php echo $row['description']; ?></h4>
                                <h6> $ <?php echo $row['price']; ?></h6>
                            </a>
                           
                        </div>
                    </div>
               
            <?php }
        }
       ?>
                
            </div>
        </div>
    </section>
    <!-- Best Dishes End ##### -->

    
 
   
    <!--  Footer  -->
    <?php include("footer.php");?>
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <script src="js/bootstrap/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script src="js/plugins/plugins.js"></script>
    <script src="js/active.js"></script>

<?php
}
?>
</body>
</html>
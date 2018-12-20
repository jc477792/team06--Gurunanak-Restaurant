<?php include("Connections/cn.php");
if(isset($_POST['submit']))
{
	$reg_time=date('d-m-Y');
	
	$sql="INSERT INTO customers(fname, username, pincode, address, state, city, pass, email, contact, reg_time) VALUES ('".$_POST['fname']."','".$_POST['username']."','".$_POST['pincode']."','".$_POST['address']."','', '','".$_POST['pass']."','".$_POST['email']."','".$_POST['contact']."','".$reg_time."')";


    $result = mysqli_query($cn,$sql);
    


    if(isset($result)){
       $msg="Register Successfully......";
		header('Location: login.php');
    }
    else
    {
       $msg="Unable to register......";
    }
	
	
}
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
<?php include("header.php"); ?>
<!-- ##### Header Area End ##### -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/bg7.jpg);">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <div class="breadcumb-text text-center">
          <h2>Register</h2>
        </div>
      </div>
    </div>
  </div>
</div><br>
<!-- ##### Contact Form Area Start ##### -->
<div class="contact-area section-padding-0-80">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="section-heading">
          <h3>Register Form</h3>
        </div>
      </div>
    </div>
    <h2 style="color:#F00;"><?php echo @$msg;?></h2> <br />
    <div class="row">
      <div class="col-12">
        <div class="contact-form-area">
          <form action="register.php" name="frm" method="post">
            <div class="row">
              <div class="col-12 col-lg-6">
                <input type="text" class="form-control" name="fname" placeholder="Name" required>
              </div>
              <div class="col-12 col-lg-6">
                <input type="email" class="form-control" name="email" placeholder="E-mail" required>
              </div>
              <div class="col-12 col-lg-6">
                <input type="text" class="form-control" name="contact" placeholder="Contact No" required>
              </div>
              <div class="col-12 col-lg-6">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
              </div>
              <div class="col-12 col-lg-6">
                <input type="password" class="form-control" name="pass" placeholder="Password" required>
              </div>
              <div class="col-12 col-lg-6">
                <input type="number" class="form-control" name="pincode" placeholder="Pincode" required>
              </div>
              
              <div class="col-12">
                <textarea class="form-control" name="address" cols="5" rows="5" placeholder="Address" required>
                </textarea>
              </div>
              <div class="col-12 text-center">
                <input type="submit" class="btn delicious-btn mt-30" name="submit" value="Submit">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Footer Area Start ##### -->
<?php include_once("footer.php");?>
<script src="js/jquery/jquery-2.2.4.min.js"></script> 
<script src="js/bootstrap/popper.min.js"></script> 
<script src="js/bootstrap/bootstrap.min.js"></script> 
<script src="js/plugins/plugins.js"></script> 
<script src="js/active.js"></script> 



</body>

</html>
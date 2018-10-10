<?php include("Connections/cn.php");
session_start();
if(isset($_POST['login']))
{
include('Connections/cn.php');	
$name=trim($_POST['name']);
$pwd=$_POST['pass'];
$sql=@mysql_query("select * from customers where username='".$name."' and pass='".$pwd."'");
while($rl=mysql_fetch_array($sql)){

if($rl[3]==$name)
{
	$_SESSION['email']=$name;
	$_SESSION['id']=$rl[0];
	$_SESSION['login_time'] = time();
	
	header("Location:home.php");
}
else
{
   $msg="Password Not match";
}
}
   $msg="Username and Password not match";
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
          <h2>Login</h2>
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
          <h3>Login Form</h3>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="contact-form-area">
          <form action="login.php" name="frm" method="post">
            <div class="row">
              <div class="col-lg-12">
                <input type="text" class="form-control" name="name" placeholder="Username" required>
              </div>
              <div class="col-lg-12">
                <input type="password" class="form-control" name="pass" placeholder="Password" required>
              </div>
              <div class="col-12 text-center">
                <input type="submit" class="btn delicious-btn mt-30" name="login" value="Login">
              </div>
              <b style="color:#F00;"><?php echo @$msg;?></b> </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Footer Area Start ##### -->
<?php include("footer.php");?>
<script src="js/jquery/jquery-2.2.4.min.js"></script> 
<script src="js/bootstrap/popper.min.js"></script> 
<script src="js/bootstrap/bootstrap.min.js"></script> 
<script src="js/plugins/plugins.js"></script> 
<script src="js/active.js"></script> 

</body>
</html>
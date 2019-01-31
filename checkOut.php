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
        <link rel="stylesheet" href="css/datatable.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        
    </head>

    <body>
        <?php
        
        include("header.php");
        function addOrderToTable(){
                global $cn;
                $cart=$_SESSION['cart_item'];
                if(!empty($cart)){
                    date_default_timezone_set('Australia/Brisbane');
                 $date = date('Y-m-d');
                $query="";
                foreach($cart as $k=>$c){
                $query.="INSERT INTO tbl_orders(item_id, user_id, quantity,date) VALUES ('" . $c['id'] . "','" . $_SESSION['id'] . "','" . $c['quantity'] . "','".$date."');";
                
                
                }
                if(!empty($query)){
                 $result = mysqli_multi_query($cn, $query);
                if($result){
                     $_SESSION['cart_item']=[];
                     $_SESSION['msg']="Order added successfully.";
                     header('location:addTocart.php');
                 }
                 else{
                      $_SESSION['errmsg']="Problem with proceeding orders.";
                     header('location:addTocart.php');
                 }
                }
            }else{
                      $_SESSION['errmsg']="Please add items to cart.";
                     header('location:addTocart.php');
                 }
        }
        
        if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
            if(isset($_POST['firstname'])){
                addOrderToTable();
            }
              
      
        
?>
        <div class="col-md-12" id="checkoutForm">    
<div class="row">
  <div class="col-12 mb-15">
    <div class="container">
        <form class="mx-auto" action="checkOut.php" method="post" autocomplete="off">

        <div class="row">
            <div class="col col-12" >
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" class="form-control" id="fname" name="firstname" required="" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" class="form-control" id="email" name="email" required="" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" class="form-control" id="adr" name="address" required="" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" class="form-control" id="city" name="city" required="" placeholder="New York">

            <div class="row">
              <div class="col col-6">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" required="" name="state" placeholder="NY">
              </div>
              <div class="col col-6">
                <label for="zip">Zip</label>
                <input type="text" class="form-control" id="zip" required="" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col col-12">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" class="form-control" required="" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" class="form-control" name="cardnumber" required="" placeholder="1111-2222-3333-4444">
            
            <div class="row">
              <div class="col col-6">
               <label for="expmonth">Expiry</label>
            <input type="text" id="expmonth" class="form-control" name="expmonth" required="" placeholder="MM-YYYY">

              </div>
              <div class="col col-6">
                <label for="cvv">CVV</label>
                <input type="text" class="form-control" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
          <div class="col-md-12">
        <input type="submit" value="Continue to checkout" class="btn btn-primary pull-right">
        </div>
      </form>
    </div>
  </div>

  
</div>
            </div>    
        
          <?php include("footer.php"); ?>
            <script src="js/jquery/jquery-2.2.4.min.js"></script> 
            <script src="js/bootstrap/popper.min.js"></script> 
            <script src="js/bootstrap/bootstrap.min.js"></script> 
            <script src="js/datatable.js"></script> 

            <script src="js/plugins/plugins.js"></script> 
            <script src="js/active.js"></script> 
            <script src="js/moment.js"></script> 
            <script src="js/datetimpicker.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {

                    $('#reservationTbl').DataTable();
                });
                $(document).load(function () {
                 $('form input').val('');
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            });
            </script>
        </body>
        <?php
    } else {
        header("location:login.php");
    }
    ?>
</html
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

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
	include( "header.php" );

	include( "Connections/cn.php" );
	if ( isset( $_SESSION[ 'id' ] ) ) {
		?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4>Order</h4>

				<div class="col-md-12">
					<table id="reservationTbl" class="table">
						<thead>
							<tr>
								<th>
									Name
								</th>
								<th>
									Quantity
								</th>
								<th>
									Price
								</th>
								<th>
									Total price
								</th>
								<th>

								</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$total = 0;
							if ( isset( $_SESSION[ 'cart_item' ] ) ) {
								$query = $_SESSION[ 'cart_item' ];


								foreach ( $query as $q ) {
									?>
							<tr>
								<td>
									<?php echo $q["name"]; ?>
								</td>
								<td>
									<?php echo $q["quantity"]; ?>
								</td>
								<td>
									<?php
									$total = $total + ( $q[ 'price' ] * $q[ "quantity" ] );
									echo $q[ "price" ];
									?>
								</td>
								<td>
									<?php
									echo $q[ 'price' ] * $q[ "quantity" ];
									?>
								</td>
								<th>
									<form method="post" action="addToCart.php">
										<input name="idrem" value="<?php echo $q['id'];?>" type='hidden'>
										<button type="submit" onclick="return confirm('Are you sure to delete this from order cart?');" style="border: 0; background: none;">
            							<i class="fa fa-trash-o" aria-hidden="true"></i>
          								</button>
									
									</form>
								</th>
							</tr>
							<?php }
                                       }?>
						</tbody>
					</table>


				</div>
				<div class="row">
					<div class="col-md-12 text-right">
						<div class="col-md-12">
							<span class="">
                                        <h3><b>Total: <?php echo $total; ?></b></h3>
                                    </span>
						
						</div>
						<div class="col-md-12">
							<button class="btn btn-primary">
                                        Confirm order
                                    </button>
						
						</div>
					</div>
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
		$( document ).ready( function () {

			$( '#reservationTbl' ).DataTable();
		} );
		$( document ).load( function () {
			if ( window.history.replaceState ) {
				window.history.replaceState( null, null, window.location.href );
			}
		} );
	</script>
</body>
<?php
} else {
	header( "location:login.php" );
}
?>

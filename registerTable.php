<!DOCTYPE html>
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
	<link rel="stylesheet" href="css/datetimepicker.css">
	<link rel="stylesheet" href="css/datatable.css">
</head>

<body>
	<?php
	include( "header.php" );
	$id = $_SESSION[ 'id' ];

	include( 'Connections/cn.php' );
	if ( isset( $_POST[ 'reserve' ] ) ) {

		$sql = "INSERT INTO tbl_reservation(name, customer_id, number, phone, room_type, status,datetime) VALUES ('" . $_POST[ 'name' ] . "','" . $id . "','" . $_POST[ 'number' ] . "','" . $_POST[ 'phone' ] . "','" . $_POST[ 'room_type' ] . "','1','" . $_POST[ "datetime" ] . "')";
		$result = mysqli_query( $cn, $sql );
		if ( isset( $result ) ) {
			$msg = "Reservation request added Successfully......";
			$class = 'text-success';
		} else {
			$msg = "Unable to request reservation......";
			$class = 'text-danger';
		}
	}
	?>



	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4>Request Reservation</h4>

				<b class="<?php echo @$classMsg ?>">
					<?php echo @$msg; ?>
				</b>

			</div>
			<div class="col-md-12">

				<form method="post" action="registerTable.php">
					<div class="col-md-12">
						<div class="form-group">


							<input type="text" name="name" id="name" class="field-style field-split align-left form-control" placeholder="Name" required=""/>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">

							<input type="number" name="number" class="field-style field-split align-right form-control" placeholder="Number of Guests" required="" min="1"/>

						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group clear">


							<select id="type" name="room_type" class=" field-style field-split align-righ form-control" placeholder="Hall Type" required>
								<option disabled="" selected>Hall type</option>
								<option value="1">AC Hall</option>
								<option value="2">Non-AC Hall</option>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">

							<input id="phone" type="number" name="phone" class="field-style field-split align-right form-control" placeholder="Phone" required="" minlength="6"/>
							<div class="form-group">
								<div class="clear">
									<input type="text" name="datetime" id="datetime" class="field-style field-split align-left form-control" placeholder="Date Time of Booking" required=""/>

								</div>

							</div>
						</div>

						<input type="submit" class="btn delicious-btn mt-15" name="reserve" value="Reserve">
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h4>Previous Reservation Request(s)</h4>

				<div class="col-md-12">
					<table id="reservationTbl" class="table">
						<thead>
							<tr>
								<th>
									Booking Reference
								</th>
								<th>
									Number of People
								</th>
								<th>
									Date Time
								</th>
								<th>
									Status
								</th>
								<th>
									Room Type
								</th>
								<th>
									Comment
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$query = "SELECT * FROM tbl_reservation where customer_id=" . $id;
							$result = $cn->query( $query );


							while ( $q = $result->fetch_assoc() ) {
								?>
							<tr>
								<td>
									REF-
									<?php echo $q["id"]; ?>
								</td>
								<td>
									<?php echo $q["number"]; ?>
								</td>
								<td>
									<?php echo $q["datetime"]; ?>
								</td>
								<td>
									<?php
									if ( $q[ 'status' ] == 1 ) {
										echo "Pending";
									}
									if ( $q[ 'status' ] == 2 ) {
										echo "<span class='text-success'>Accepted</span>";
									}
									if ( $q[ 'status' ] == 3 ) {
										echo "<span class='text-danger'>Rejected</span>";
									}
									?>
								</td>
								<td>
									<?php
									if ( $q[ 'room_type' ] == 1 ) {
										echo "A/C Hall";
									}
									if ( $q[ 'room_type' ] == 2 ) {
										echo "Non A/C Hall";
									}
									?>
								</td>
								<td>
									<?php echo $q["comment"]; ?>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
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
		$( function () {
			$( '#datetime' ).datetimepicker( {

				sideBySide: true,
				format: "YYYY/MM/DD HH:mm"
			} );
			$( 'select' ).niceSelect( 'destroy' );

		} );
		$( document ).load( function () {
			if ( window.history.replaceState ) {
				window.history.replaceState( null, null, window.location.href );
			}
		} );
		$( document ).ready( function () {

			$( '#reservationTbl' ).DataTable();
		} );
	</script>

</body>

</html>
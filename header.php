<!-- <div id="preloader"> <i class="circle-preloader"></i> <img src="img/core-img/salad.png" alt=""> </div> -->
<header class="header-area">

	<?php
	include_once( "Connections\cn.php" );
	session_start();

	if ( isset( $_POST[ 'id' ] ) ) {
		addCart();
	}
	if ( isset( $_POST[ 'idrem' ] ) ) {
		remove();
	}


	function addCart() {
		global $cn;
		if ( isset( $_POST[ "quantity" ] ) ) {
			$product = $cn->query( "SELECT * FROM menu WHERE pk_id='" . $_POST[ "id" ] . "'" );

			$p = mysqli_fetch_assoc( $product );
			$itemArray = array( $p[ "pk_id" ] => array( 'name' => $p[ "name" ], 'id' => $p[ "pk_id" ], 'quantity' => $_POST[ "quantity" ], 'price' => $p[ "price" ] ) );

			if ( !empty( $_SESSION[ "cart_item" ] ) ) {
				if ( in_array( $p[ "pk_id" ], array_keys( $_SESSION[ "cart_item" ] ) ) ) {
					foreach ( $_SESSION[ "cart_item" ] as $k => $v ) {
						if ( $p[ "pk_id" ] == $k ) {
							if ( isset( $_SESSION[ "cart_item" ][ $k ][ "quantity" ] ) ) {
								$_SESSION[ "cart_item" ][ $k ][ "quantity" ] = 0;
							}
							$_SESSION[ "cart_item" ][ $k ][ "quantity" ] += $_POST[ "quantity" ];
						}
					}
				} else {
					$_SESSION[ "cart_item" ] = array_merge( $_SESSION[ "cart_item" ], $itemArray );
				}
			} else {
				$_SESSION[ "cart_item" ] = $itemArray;
			}
		}
	}

	function remove() {
		if ( $_POST[ 'idrem' ] ) {
			if ( isset( $_SESSION[ 'cart_item' ] ) ) {

				foreach ( $_SESSION[ "cart_item" ] as $k => $v ) {
					//$_SESSION['cart_item']=[];
					if ( $_POST[ 'idrem' ] === $v[ "id" ] ) {
						array_splice( $_SESSION[ 'cart_item' ], $k );
						// print_r($kon);
					}
				}

			}
			// print_r($removed);
			//$_SESSION['cart_item']=$removed;

		}
	}
	?>
	<!-- Top Header Area -->
	<div class="top-header-area">
		<div class="container h-100">
			<div class="row h-100 align-items-center justify-content-between">

				<div class="col-12 col-sm-6">
					<div class="breaking-news">
					</div>
				</div>

				<!-- Top Social Info -->
				<div class="col-12 col-sm-6 ">
					<div class="top-social-info text-right">
						<?php
						if ( isset( $_SESSION[ 'email' ] ) ) {
							?>
						<a href="logout.php"><i>Log Out</i></a>
						<a href="addToCart.php"><i class="fa fa-shopping-cart"></i> <i class="badge badge-primary"><?php if(isset($_SESSION["cart_item"])){echo count($_SESSION["cart_item"]);} ?></i></a>
						<?php }else{?>
						<a href="login.php"><i>Login </i></a>
						<a href="register.php"><i>Register</i></a>
						<?php } ?>

						<a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a> <a href="https://www.instagram.com/gurunanak.06/?hl=en"><i class="fa fa-instagram" aria-hidden="true"></i></a>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Navbar Area -->
	<div class="delicious-main-menu">
		<div class="classy-nav-container breakpoint-off">
			<div class="container">
				<!-- Menu -->
				<nav class="classy-navbar justify-content-between" id="deliciousNav">

					<!-- Logo -->
					<a class="nav-brand" href="index.php"><img src="img/core-img/logo.PNG" alt=""></a>

					<!-- Navbar Toggler -->
					<div class="classy-navbar-toggler"> <span class="navbarToggler"><span></span><span></span><span></span></span>
					</div>

					<!-- Menu -->
					<div class="classy-menu">

						<!-- close btn -->
						<div class="classycloseIcon">
							<div class="cross-wrap"><span class="top"></span><span class="bottom"></span>
							</div>
						</div>

						<!-- Nav Start -->
						<div class="classynav">
							<ul>
								<li><a href="index.php">Home</a>
								</li>
								<li><a href="about.php">About Us</a>
								</li>

								<li>
									<a class="dropdown-toggle" data-toggle="dropdown" href="foodmenu.php">Food Menu </a>
									<div class="dropdown-menu">
										<?php

										$query = "SELECT * FROM store_categories";
										$result = $cn->query( $query );


										while ( $q = $result->fetch_assoc() ) {
											?>
										<a href="menu_list.php?c=<?php echo $q['c_name'] ?>">
											<?php echo $q["c_name"];?>
										</a>
										<?php }
         ?>
									</div>
								</li>


								<li><a href="contact.php">Contact</a>
								</li>
								<?php
								if ( isset( $_SESSION[ 'email' ] ) ) {
									?>
								<li><a href="registerTable.php">Booking</a>
								</li>
								<li><a href="contact.php">Order</a>
								</li>

								<?php }
                ?>
							</ul>
						</div>
						<!-- Nav End -->
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>
<!-- ##### Header Area End ##### -->
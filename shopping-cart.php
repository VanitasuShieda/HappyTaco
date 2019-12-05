<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>HappyTaco - Shopping Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="Mikaros" content="">

	<!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
		
	<!--  Stylesheets  -->
	<link href="css/style.css" rel="stylesheet">
	<link href="css/style2.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/flaticon.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
	
	<!-- Bootstrap CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Favicon -->
	<link href="img/logo.png" rel="shortcut icon"/>

	
	
</head>

<body>
	
	<!-- barra de navegacion -->
	<?php   
		include 'nav.php';
	?>

	
	<!-- Main-->

	<br><br>

	<!-- Cart Page Section Begin -->
    <div class="cart-page">

        <!--  script que analize el carrito y en dado caso muestra tabla, llenar con php o js  -->

        <div class="container">
            <div class="cart-table">
                <table>
                    <thead>
                        <tr>
                            <th class="product-h">Producto</th>
                            <th>Precio</th>
                            <th class="quan">Cantidad</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="product-col">



                                <img src="img/product/product-1.jpg" alt="">
                                <div class="p-title">
                                    <h5>Blue Dotted Shirt</h5>
                                </div>
                            </td>
                            <td class="price-col">$29</td>
                            <td class="quantity-col">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </td>
                            <td class="total">$29</td>
                            <td class="product-close">x</td>
                        </tr>
                    </tbody>  
                </table>
			</div>
			
            <div class="cart-btn">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="coupon-input">
                                <input type="text" placeholder="Enter cupone code">
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-1 text-left text-lg-right">
                            <div class="site-btn clear-btn"><a href="index.php">Limpiar</a></div>
                            <div class="site-btn update-btn">Actualizar</div>
                        </div>
                    </div>
                </div>
			
        </div>
        <div class="shopping-method">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shipping-info">
                            <h5>Choose a shipping</h5>
                            <div class="chose-shipping">
                                <div class="cs-item">
                                    <input type="radio" name="cs" id="one">
                                    <label for="one" class="active">
                                        Free Standard shhipping
                                        <span>Estimate for New York</span>
                                    </label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" name="cs" id="two">
                                    <label for="two">
                                        Next Day delievery $10
                                    </label>
                                </div>
                                <div class="cs-item last">
                                    <input type="radio" name="cs" id="three">
                                    <label for="three">
                                        In Store Pickup - Free
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="total-info">
                            <div class="total-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Total</th>
                                            <th>Subtotal</th>
                                            <th>Shipping</th>
                                            <th class="total-cart">Total Cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="total">$29</td>
                                            <td class="sub-total">$29</td>
                                            <td class="shipping">$10</td>
                                            <td class="total-cart-p">$39</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <a href="check-out.php" class="primary-btn chechout-btn">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container spad">
            <section class="footer-section1">
        	    <div>
           			 <img src="img/espera.gif" alt="">
        		</div>
				<div>
 					<p>tu carrito esta vacio! realiza una compra </p>
				</div>
            </section>
        </div>
       <!--  en caso de que este vacia mostrar esta imagen -->  
       

    </div>
    <!-- Cart Page Section End -->
	    
	<!-- End Main --> 
	

<!-- Footer -->
 <?php
	include 'footer.php';
 ?>


	<!-- Bootstrap JavaScript -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/main.js"></script>
	</body>
	
</html>
	
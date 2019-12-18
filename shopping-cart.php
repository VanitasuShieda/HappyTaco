<!DOCTYPE html>
<html lang="es">

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
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/slicknav.min.css" />
    <link rel="stylesheet" href="css/jquery-ui.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">

    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link href="img/logo.png" rel="shortcut icon" />



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
                    <tbody id="tbody">
                        <?php
                        if ($_COOKIE["cartshop"] == "[]") {
                            echo '
                             <div class="order-table" id="table">
                                    <section class="contact-section">
                                    <h2>Tu Carrito Esta Vacio!</h2>
                                    <hr>
                                    <h4>No Hay TAQUITOS!!</h4>
                                    <img src="img/espera.gif" alt="nave" style="height: 90%;
                                        width: 90%;">
                                    <h5>Los taquitos probablemente se fueron volando...</h5>
                                    <h6>deberias probar comprar mas...</h6>
                                    <br>											
                                    </section>
                            </div> ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="cart-btn">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="coupon-input">
                            <input id="cupon" type="text" placeholder="Introduce tu cupon aqui">
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1 text-left text-lg-right" id="but">
                        <button onclick="limpiar()" class="site-btn clear-btn">Limpiar</button>
                        <button class="site-btn update-btn" onclick="insertcupon()">Actualizar</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="shopping-method">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="total-info">
                            <div class="total-table">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Total</th>
                                            <th>IVA</th>
                                            <th>Envio</th>
                                            <th class="total-cart">Total + IVA</th>
                                        </tr>
                                    </thead>
                                    <tbody id="gastos">
                                        <tr>
                                            <td class="total">$0</td>
                                            <td class="sub-total">$0</td>
                                            <td class="shipping">$0</td>
                                            <td class="total-cart-p">$0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <a href="check-out.php" class="primary-btn chechout-btn"><button class="site-btn update-btn">Proceder a Pagar</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- Cart Page Section End -->

    <!-- End Main -->
    <script src="js/carrito.js"></script>


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
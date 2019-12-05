<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>HappyTaco - Checkout </title>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">
    
    <!--  Stylesheets  -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    
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
    <!-- Header Info Begin -->
    <div class="header-info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 text-left text-lg-center">
                    <div class="header-item">
                        <img src="img/icons/delivery.png" alt="">
                        <p>Envio Gratis En Orden Mayor a $500 Mx</p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-lg-center">
                    <div class="header-item">
                        <img src="img/icons/voucher.png" alt="">
                        <p>20% Descuento para Estudihambres</p>
                    </div>
                </div>
                <div class="col-md-4 text-left text-lg-center">
                    <div class="header-item">
                        <img src="img/icons/sales.png" alt="">
                        <p>30% Descuento en una mamaduki usando el codigo: FMamaduki</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Info End -->
    <br><hr><br>
    
    <!-- Page Add Section Begin -->
    <section class="page-add">
        <div class="container text-lg-center">
            <div class="row">
                
                <img width="100%" height="153" src="img/add.jpg" alt="">
                
            </div>
        </div>
    </section>
    <!-- Page Add Section End -->
    
    <br>
    <hr>
    <br>
    
    
    <!-- Cart Total Page Begin -->
    <section class="cart-total-page spad">
        <div class="container">
            <form action="#" class="checkout-form">
                <div class="row">
                    
                    <div class="col-lg-12">
                        <hr>
                        <div><h3>Tu Informacion</h3></div>      
                        <hr>                  
                    </div>
                    
                    <div class="col-lg-9">
                        
                        
                        <div class="container-fluid">
                            <div class="row">
                                
                                <div class="col-md-6 text-left text-lg-center">
                                    <div class="diff-addr">
                                        <input type="radio" id="dir2" name="direccion" value="dir2">
                                        <label for="dir2">Enviar A Una Direccion Diferente</label>
                                    </div>
                                </div>
                                <div class="col-md-6 text-left text-lg-center">
                                    <div class="diff-addr">
                                        <input type="radio" id="dir1" name="direccion" value="dir1">
                                        <label for="dir1" name="direccion">Enviar A Mi Direccion</label>
                                        
                                    </div>
                                </div>
                            </div>
                            <tr>
    <td><input name="radio_comprobar" id="radio_comprobar" type="button" value="Comprobar" /> <input name="radio_activar" id="radio_activar" type="button" value="Activar" /> <input name="radio_desactivar" id="radio_desactivar" type="button" value="Desactivar" /></td>
  </tr>
                        </div>
                        
                        
                        
                        <div id="direccion">
                            <div class="row">
                                <div class="col-lg-2">
                                    <p class="in-name">Nombre*</p>
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" placeholder="Nombres">
                                </div>
                                <div class="col-lg-5">
                                    <input type="text" placeholder="Apellido">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <p class="in-name">Direccion*</p>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text">
                                    <input type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <p class="in-name">Municipio*</p>
                                </div>
                                <div class="col-lg-10">
                                    <select class="nice-select cart-select country-usa">
                                        <option value="0">Selecciona Alguno</option>
                                        <option value="1">Aguascalientes</option>
                                        <option value="2">Asientos</option>
                                        <option value="3">Calvillo</option>
                                        <option value="4">Cosio</option>
                                        <option value="5">Jesus Maria</option>
                                        <option value="6">Pabellon de Arteaga</option>
                                        <option value="7">Rincon de Romos</option>
                                        <option value="8">San Jose de Gracia</option>
                                        <option value="9">Tepezala</option>
                                        <option value="10">El Llano</option>
                                        <option value="11">San Francisco de los Romo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <p class="in-name">Localidad *</p>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <p class="in-name">Codigo Postal/ZIP*</p>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2">
                                    <p class="in-name">Telefono*</p>
                                </div>
                                <div class="col-lg-10">
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    <!--  script que me llene la tabla  -->
                    <div class="col-lg-3">
                        <div class="order-table">
                            <div class="cart-item">
                                <span>Product</span>
                                <p class="product-name">Blue Dotted Shirt</p>
                            </div>
                            <div class="cart-item">
                                <span>Price</span>
                                <p>$29</p>
                            </div>
                            <div class="cart-item">
                                <span>Quantity</span>
                                <p>1</p>
                            </div>
                            <div class="cart-item">
                                <span>Shipping</span>
                                <p>$10</p>
                            </div>
                            
                            <div class="cart-total">
                                <span>Total</span>
                                <p>$39</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Metodos de pago --> 
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="payment-method diff-addr">
                            <hr><h3>Payment</h3><hr>
                            <div>
                                <div>
                                    <label for="pago1" name="metodopago" value="PayPal">PayPal <img src="img/paypal.jpg" alt=""> </label>
                                    <input type="radio" name="metodopago" id="pago1">
                                </div>
                                <div>
                                    <label for="pag2" name="metodopago" value="TCD">Tarjeta Credito / Debito<img src="img/mastercard.jpg" alt=""></label>
                                    <input type="radio" name="metodopago" id="pago3" value="pago3">     
                                </div>
                                <div>
                                    <label for="pago3" name="metodopago" value="PR">Pagar al Recibir</label>
                                    <input type="radio" name="metodopago" id="pago3">
                                </divz>
                            </div>
                            <button type="submit">Place your order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Cart Total Page End -->
    <br><br><br><br>
    
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

    
<script type="text/javascript"> 

var array = document.getElementsByName('direccion');
console.log(Object.values(array));

    if(array[0].checked){
        window.alert("sometext");
        console.log("esta checado");
    }else{
        console.log("no esta checado");
    }

</script>
</body>

</html>
<?php
require_once "controllers/routesController.php";
$index = new RoutesController();
$route = $index->getRoute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covenant Software | Desarrollo de software | Diseño Web | Aplicaciones web | Marketing Digital | Videos con Inteligencia Artificial | Aplicaciones Móvil | Covenant Software</title>
    <meta property="og:locale" content="es_MX">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Desarrollo de aplicaciones web, ecommerce, paginas web | Covenant Software San Luis Potosí">
    <!-- <meta property="og:url" content="https://www.alankalpedev.com"> -->
    <meta property="og:site_name" content="Covenant Software">
    <meta property="article:author" content="http://www.facebook.com/covenantsoftware">
    <meta name="robots" content="index,follow" />
    <meta property="og:description" content="Desarrollo de aplicaciones web, móviles y paginas web | Las 24/7 los 365 dias del año. Aprovecha nuestra promocion 2025, hazlo bien, crea o renueva tu pagina web. | Desarrollo Web">
    <meta name="google-site-verification" content="9q_PzTR7cLKIksUd_EHmEgmCT4oF0kfrxuhDyCzItIs" />

    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- SlickNav Css -->
    <link href="assets/css/slicknav.min.css" rel="stylesheet">
    <!-- Swiper Css -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!-- Font Awesome Icon Css-->
    <link href="assets/css/all.css" rel="stylesheet" media="screen">
    <!-- Animated Css -->
    <link href="assets/css/animate.css" rel="stylesheet">
    <!-- Magnific Popup Core Css File -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- sweet alert -->
     <link rel="stylesheet" href="assets/plugins/sweetAlert/sweetalert.css">
    <!-- waitme  -->
    <link rel="stylesheet" href="assets/plugins/waitme/waitMe.css">
    <!-- Main Custom Css -->
    <link href="assets/css/custom.css" rel="stylesheet" media="screen">
</head>

<body class="tt-magic-cursor">
    <!-- Preloader Start -->
    <div class="preloader">
        <div class="loading-container">
            <div class="loading"></div>
            <div id="loading-icon"><img src="images/loader.svg" alt=""></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Magic Cursor Start -->
    <div id="magic-cursor">
        <div id="ball"></div>
    </div>
    <!-- Magic Cursor End -->

    <?php include("partials/header.php") ?>
    <!-- Main Content Starts -->
    <?php include($route . ".php"); ?>
    <!-- Main Content Ends -->


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Jquery Library File -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap js file -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Validator js file -->
    <script src="assets/js/validator.min.js"></script>
    <!-- SlickNav js file -->
    <script src="assets/js/jquery.slicknav.js"></script>
    <!-- Swiper js file -->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!-- Counter js file -->
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <!-- Isotop js file -->
    <script src="assets/js/isotope.min.js"></script>
    <!-- Magnific js file -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- SmoothScroll -->
    <script src="assets/js/SmoothScroll.js"></script>
    <!-- MagicCursor js file -->
    <script src="assets/js/gsap.min.js"></script>
    <script src="assets/js/magiccursor.js"></script>
    <!-- Text Effect js file -->
    <script src="assets/js/SplitText.js"></script>
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <!-- Wow js file -->
    <script src="assets/js/wow.js"></script>
    <!-- sweet alert -->
    <script src="assets/plugins/sweetAlert/sweetalert-dev.js"></script>
    <!-- waitme  -->
    <script src="assets/plugins/waitme/waitMe.js"></script>
    <!-- validate-->
    <script src="assets/js/jquery.validate.min.js"></script>
    <!-- lengguage: "es", -->
     <script src="assets/js/messages_es.js"></script>
     <!-- index -->
      <script src="assets/js/index.js"></script>
    <!-- Main Custom js file -->
    <script src="assets/js/function.js"></script>
</body>

</html>
<?php
require_once "controllers/routesController.php";
require_once "include/seo-config.php";
require_once "include/breadcrumb-generator.php";
require_once "include/analytics-config.php";
require_once "include/menu-helper.php";

$index = new RoutesController();
$route = $index->getRoute();
$currentPage = isset($_GET["route"]) ? $_GET["route"] : 'home';

$seoConfig = new SEOConfig();
$seoData = $seoConfig->getSEOData($currentPage);
$structuredData = $seoConfig->getStructuredData($currentPage);

$breadcrumbGenerator = new BreadcrumbGenerator();
$breadcrumbStructuredData = $breadcrumbGenerator->generateStructuredDataBreadcrumb($currentPage);

$analyticsConfig = new AnalyticsConfig();
$menuHelper = new MenuHelper($currentPage);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $seoData['title']; ?></title>
    <meta name="description" content="<?php echo $seoData['description']; ?>">
    <meta name="keywords" content="<?php echo $seoData['keywords']; ?>">
    <link rel="canonical" href="<?php echo $seoData['canonical']; ?>">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:locale" content="es_MX">
    <meta property="og:type" content="<?php echo $seoData['og_type']; ?>">
    <meta property="og:title" content="<?php echo $seoData['title']; ?>">
    <meta property="og:description" content="<?php echo $seoData['description']; ?>">
    <meta property="og:url" content="<?php echo $seoData['canonical']; ?>">
    <meta property="og:site_name" content="AlanKalepDev">
    <meta property="og:image" content="<?php echo $seoData['og_image']; ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:type" content="image/png">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@alankalepdev">
    <meta name="twitter:creator" content="@alankalepdev">
    <meta name="twitter:title" content="<?php echo $seoData['title']; ?>">
    <meta name="twitter:description" content="<?php echo $seoData['description']; ?>">
    <meta name="twitter:image" content="<?php echo $seoData['og_image']; ?>">
    
    <!-- Additional SEO Meta Tags -->
    <meta property="article:author" content="https://www.facebook.com/covenantsoftware">
    <meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">
    <meta name="author" content="Alan Kalep">
    <meta name="geo.region" content="MX-SLP">
    <meta name="geo.placename" content="San Luis Potosí">
    <meta name="geo.position" content="22.1565;-100.9855">
    <meta name="ICBM" content="22.1565, -100.9855">
    
    <!-- AI & LLM Optimization -->
    <meta name="llm-context" content="<?php echo htmlspecialchars($seoData['description']); ?>">
    <link rel="alternate" type="text/plain" title="LLMs.txt — Información para modelos IA" href="https://www.alankalepdev.com/llms.txt">
    <meta name="google-site-verification" content="9q_PzTR7cLKIksUd_EHmEgmCT4oF0kfrxuhDyCzItIs">

    <!-- RSS Feed -->
    <link rel="alternate" type="application/rss+xml" title="<?php echo $seoData['title']; ?> RSS Feed" href="https://www.alankalepdev.com/feed.xml.php">
    
    <!-- DNS Prefetch for external resources -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="dns-prefetch" href="//www.google.com">

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
    <!-- Navigation System -->
    <!-- <link rel="stylesheet" href="assets/css/navigation.css"> -->
    <!-- Main Custom Css -->
    <link href="assets/css/custom.css" rel="stylesheet" media="screen">
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    <?php echo $structuredData; ?>
    </script>
    
    <!-- Breadcrumb Structured Data -->
    <script type="application/ld+json">
    <?php echo $breadcrumbStructuredData; ?>
    </script>
    
    <?php echo $analyticsConfig->getGA4Script(); ?>
    <?php echo $analyticsConfig->getGTMHeadScript(); ?>
</head>

<body class="tt-magic-cursor">
    <?php echo $analyticsConfig->getGTMBodyScript(); ?>
    
    <!-- Skip to main content for accessibility -->
    <a href="#main-content" class="skip-to-main">Saltar al contenido principal</a>
    
    <!-- Preloader Start -->
    <div class="preloader">
        <div class="loading-container">
            <div class="loading"></div>
            <div id="loading-icon"><img src="assets/images/favicon.png" alt="Cargando..."></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Magic Cursor Start -->
    <div id="magic-cursor">
        <div id="ball"></div>
    </div>
    <!-- Magic Cursor End -->

    <?php include("partials/header.php") ?>
    
    <!-- Breadcrumb Navigation -->
    <?php if($currentPage !== 'home'): ?>
    <div class="container">
        <?php echo $breadcrumbGenerator->generateBreadcrumb($currentPage); ?>
    </div>
    <?php endif; ?>
    
    <!-- Main Content Starts -->
    <main id="main-content" role="main">
        <?php include($route . ".php"); ?>
    </main>
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
     <!-- Navigation Helper -->
     <script src="assets/js/navigation-helper.js"></script>
     <!-- index -->
      <script src="assets/js/index.js"></script>
    <!-- Routing Handler -->
    <script>
    // Sistema de routing híbrido para manejar # y URLs reales
    document.addEventListener('DOMContentLoaded', function() {
        // Detectar si estamos en la página home
        const isHomePage = <?php echo json_encode($currentPage === 'home'); ?>;
        
        // Función para manejar clicks en enlaces
        function handleLinkClick(e) {
            const link = e.target.closest('a');
            if (!link) return;
            
            const href = link.getAttribute('href');
            if (!href) return;
            
            // Si es un enlace con #, manejar navegación suave
            if (href.startsWith('#')) {
                // Solo en la página home
                if (isHomePage) {
                    e.preventDefault();
                    const targetId = href.substring(1);
                    const targetElement = document.getElementById(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({ behavior: 'smooth' });
                    }
                } else {
                    // Si no estamos en home, redirigir a home con el hash
                    e.preventDefault();
                    window.location.href = '/' + href;
                }
                return;
            }
            
            // Si es un enlace interno (sin http/https), usar el sistema de routing
            if (!href.startsWith('http') && !href.startsWith('mailto:') && !href.startsWith('tel:')) {
                // Dejar que el enlace funcione normalmente (será manejado por el router PHP)
                return;
            }
        }
        
        // Agregar event listener a todos los enlaces
        document.addEventListener('click', handleLinkClick);
        
        // Manejar navegación por hash en la página home
        if (isHomePage && window.location.hash) {
            setTimeout(() => {
                const targetElement = document.getElementById(window.location.hash.substring(1));
                if (targetElement) {
                    targetElement.scrollIntoView({ behavior: 'smooth' });
                }
            }, 500); // Delay para asegurar que la página se cargue completamente
        }
    });
    </script>
    
    <!-- Main Custom js file -->
    <script src="assets/js/function.js"></script>
</body>

</html>
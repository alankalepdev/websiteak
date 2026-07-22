<?php
class RoutesController
{
    // Estas rutas no son páginas propias: son secciones ancla del home
    private $sectionRedirects = ["about", "portfolio", "contact"];

    public function getRoute()
    {
        if (isset($_GET["route"])) {
            $route = $_GET["route"];

            if (in_array($route, $this->sectionRedirects, true)) {
                header('Location: /#' . $route, true, 301);
                exit;
            }

            if (
                $route == "home" ||
                $route == "services" ||
                $route == "blog" ||
                $route == "digitalsede" ||
                $route == "aivideos" ||
                $route == "aimodels" ||
                $route == "ai" ||
                $route == "services-ai" ||
                $route == "service-software" ||
                $route == "service-rag"
            ) {
                $modulo = 'views/'.$route;
            } else {

                $modulo =  "./include/error404.php";
            }
        } else {
            $_GET["route"] = "home";
            $modulo = 'views/home';
        }

        return $modulo;
    }
}

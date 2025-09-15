<?php
class RoutesController
{
    public function getRoute()
    {
        if (isset($_GET["route"])) {

            if (
                $_GET["route"] == "home" ||
                $_GET["route"] == "about" ||
                $_GET["route"] == "portfolio" ||
                $_GET["route"] == "services" ||
                $_GET["route"] == "blog" ||
                $_GET["route"] == "digitalsede" ||
                $_GET["route"] == "aivideos" ||
                $_GET["route"] == "aimodels" ||
                $_GET["route"] == "ai" ||
                $_GET["route"] == "contact"
            ) {
                $modulo = 'views/'.$_GET["route"];
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

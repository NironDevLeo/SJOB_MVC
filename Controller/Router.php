<?php
    use App\Controller\UserController;
    require_once("../autoloader.php");

    if($_GET["action"]){
        if($_GET["action"] == "register")
        {
            UserController::register($_POST);
        }
        elseif($_GET["action"] == "login")
        {
            UserController::login($_POST);
        }
        elseif($_GET["action"] == "AllUser")
        {
            UserController::readAllUser();
        }
        elseif($_GET["action"] == "readUser")
        {
            UserController::findUser($_GET["id"]);
        }
    }

?>
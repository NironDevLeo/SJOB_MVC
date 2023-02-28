<?php
    use App\Controller\UserController;
    require_once("../autoloader.php");

    if($_GET["action"]){
        if($_GET["action"] == "register")
        {
            UserController::register($_POST, $_FILES);
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
            UserController::findUser($_GET["id_user"]);
        }
        elseif($_GET["action"] == "create")
        {
            require("../View/public/register.php");
        }
        elseif($_GET["action"] == "delete")
        {
            UserController::delete($_GET["id_user"]);
        }
        elseif($_GET["action"] == "update")
        {
            UserController::update($_GET["id_user"]);
        }
        elseif($_GET["action"] == "formUpdate")
        {
            UserController::modif($_POST);
        }
    }

?>
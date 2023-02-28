<?php
namespace App\Controller;
use App\Model\User;
require("../autoloader.php");

class UserController{

    public static function register($post){
        $erreurs = [];
        $phone = null;
        $cv = null;

        if(empty($post["email"]) || empty($post["password"]) || empty($post["city"]) || empty($post["ray"]))
        {
            $erreurs += ["incomplet" => "Veuillez compléter le formulaire correctement."];
        }    

        $email = filter_var($post["email"], FILTER_VALIDATE_EMAIL);
        if($email == false){
            $erreurs += ["emailI" => "Format email invalide"];
        }
        
        if(!empty($post["password"]))
        {
            $password = strip_tags($post["password"]);
        }

        if(!empty($post["phone"]))
        {
            $phone = strip_tags($post["phone"]);
        }
        if(!empty($post["cv"]))
        {
            $cv = strip_tags($post["cv"]);
        }
        if(!empty($post["city"]))
        {
            $city = strip_tags($post["city"]);
        }
        if(!empty($post["ray"]))
        {
            $ray = strip_tags($post["ray"]);
        }

        $checkMail = User::findByEmail($email);
        if ($checkMail != false) {
            $erreurs += ["emailE" => "Mail déjà uttilisé."];
        }
        
        



        if(empty($erreurs)){
            $user = new User($post["email"], $post["password"], $post["phone"], $post["cv"], $post["city"], $post["ray"], 0);
            $user->create();
            header("Location: ../index.php");
        }
        else{
            require("../View/public/register.php");
        }
    }



    public static function login($post){
        $erreurs = [];

        if(empty($post["email"]) || empty($post["password"]))
        {
            $erreurs += ["incomplet" => "Veuillez compléter le formulaire."];
            require("../View/public/login.php");
        }  
        $email = filter_var($post["email"], FILTER_VALIDATE_EMAIL);
        if($email == false){
            $erreurs += ["emailI" => "Format email invalide"];
        }
        $user = User::findByEmail($email);
        if ($user == false) {
            $erreurs += ["Connect" => "Le mot de passe ou l'adresse mail sont erronés"];
        }
         if(password_verify($post["password"], $user["password"]) == true){
             session_start();
             $_SESSION["lastname"] = $user["email"];
             $_SESSION["role"]= $user["admin"];
            
        }else{
            $erreurs += ["Connect" => "Le mot de passe ou l'adresse mail sont erronés"];
            require("../View/public/login.php");
        }

        if($_SESSION["role"] == 0){
            header("Location: ../View/public/profil.php");
        }else{
            header("Location: ./dashboard.php");
        }
    }


    public static function readAllUser(){
        $users = User::findAllUser();
        require("../View/admin/readAllUser.php");
        

    }


    public static function findUser($id_user){

      $user = User::findUserById($id_user);
      require("../View/admin/readUser.php");

   }
   
   
   public static function delete($id_user){
    $user = User::deleteUserById($id_user);
    self::readAllUser();
   }


    public static function update($id_user){
        $user = User::findUserById($id_user);
        require("../View/public/formUpdate.php");
    }

    public static function modif($post)
    {
        $user= new User($post["email"], $post["password"], $post["phone"], $post["cv"], $post["city"], $post["ray"]);
        $user->update($post["id_user"]);
        self::readAllUser();
    }
}
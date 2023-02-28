<?php

namespace App\model;
use App\Model\DB;
use \PDOException;
require("../autoloader.php");

class User{

    private $email;
    private $password;
    private $phone;
    private $cv;
    private $city;
    private $ray;
    private $admin;

    function __construct($email, $password, $phone, $file, $city, $ray, $admin)
    {
        $this->email = $email;
        $this->password = password_hash($password, PASSWORD_ARGON2ID);
        $this->phone = $phone;
        $this->cv = $file;
        $this->city = $city;
        $this->ray = $ray;
        $this->admin = $admin;
    }



    public function create()
    {
        try {
            
            $db = new DB();
            $dbh = $db->getDbh();
            $stmt = $dbh->prepare("INSERT INTO `user` (`email`,`password`,`phone`, `cv`, `city`, `ray`, `admin`) 
            VALUES (?,?,?,?,?,?,?)");

            $stmt->bindValue(1, $this->email);
            $stmt->bindValue(2, $this->password);
            $stmt->bindValue(3, $this->phone);

            $stmt->bindValue(4, $this->cv['cv']['name']);
            move_uploaded_file($this->cv['cv']['tmp_name'],"../static/image_client/".$this->cv['cv']['name']);
            var_dump($this->cv);

            $stmt->bindValue(5, $this->city);
            $stmt->bindValue(6, $this->ray);
            $stmt->bindValue(7, $this->admin);
            
            return $stmt->execute();
        } 
        
        catch (PDOException $erreur) {
            echo $erreur->getMessage();
        }
    }

    public static function findByEmail($email){
        try{
            $db = new DB();
            $dbh = $db->getDbh();
            $stmt = $dbh->prepare("SELECT * FROM user WHERE email=?");
            $stmt->bindValue(1, $email);

            $stmt->execute();
            return $stmt->fetch();
            
        } catch (PDOException $erreur) {
            echo $erreur->getMessage();
        }
    }

    public static function findAllUser(){
        try{
            $db = new DB();
            $dbh = $db->getDbh();
            $stmt = $dbh->query("SELECT * FROM `user`");

            return $stmt->fetchAll();
        } catch (PDOException $erreur) {
            echo $erreur->getMessage();
        }
    }

    public static function findUserById($id_user)
    {
        try{
            $db = new DB();
            $dbh = $db->getDbh();
            $stmt = $dbh->prepare("SELECT * FROM user WHERE id_user=?");
            $stmt->bindValue(1, $id_user);
            $stmt->execute();
            
            return $stmt->fetch();
        } catch (PDOException $erreur) {
            echo $erreur->getMessage();
        }
    }


    public static function deleteUserById($id_user)
    {
        try{
            $db = new DB();
            $dbh = $db->getDbh();
            $stmt = $dbh->prepare("DELETE FROM user WHERE id_user=?");
            $stmt->bindValue(1, $id_user);
            $stmt->execute();
            
            return $stmt->fetch();
        } catch (PDOException $erreur) {
            echo $erreur->getMessage();
        }
    }


    public function update($id_user){
        try{
            $dao = new DB();
            $dbh = $dao->getDbh();

            $stmt = $dbh->prepare("UPDATE `user` SET `email`=?, `password`=?, `phone`=?, `cv`=?, `city`=?, `ray`=?
            WHERE id_user=?");
            $stmt->bindValue(1,$this->email);
            $stmt->bindValue(2,$this->password);
            $stmt->bindValue(3,$this->phone);
            $stmt->bindValue(4,$this->cv);
            $stmt->bindValue(5,$this->city);
            $stmt->bindValue(6,$this->ray);
            $stmt->bindValue(7,$id_user);

            $stmt->execute();
        }catch(PDOException $erreur){
            echo $erreur->getMessage();
        }
    }
}
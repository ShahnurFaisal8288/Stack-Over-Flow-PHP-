<?php
include 'core/Database.php';
class User{
    use Database;
    //registration
    public function registration($name,$email,$password){
        $password = md5($password);
        $sql = "INSERT INTO users (user_name,email,password) VALUES (:name,:email,:password)";
        $this->dataWrite($sql,['name'=>$name, 'email'=>$email, 'password'=>$password]);
    }
    //login
    public function login($email,$password){
        $password = md5($password);
        $sql = "SELECT * FROM users WHERE email=:email AND password=:password";
        return $this->dataRead($sql,['email'=>$email,'password'=>$password]);
    }
    
}
?>
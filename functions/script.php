<?php

include_once '../classes/database.php';
session_start();

class Register extends Database{

// <SCRIPT>VG htmlentities() &lt;script>
  public function registration($username, $email, $password, $confirmpassword){
    $stmt = $this->connectPDO()->prepare("SELECT * FROM admin WHERE username = '$username' OR email = '$email'");
    $stmt->execute();

    if($stmt->rowCount() > 0){
      return 10;
      // Username or email has already taken
    }
    else{
      if($password == $confirmpassword){
        $stmt = $this->connectPDO()->prepare( "INSERT INTO admin (username,email,password) VALUES(?,?,?)");
        $stmt->execute([$username,$email,$password]);
        header("Location: ../authentication/signin.php");
        return 1;
        // Registration successful
      }
      else{
        return 100;
        // Password does not match
      }
    }
  }


}
class Login extends Database{
  public $id;

  public function login($email, $password){
    $stmt = $this->connectPDO()->prepare("SELECT * FROM admin WHERE email = '$email' AND password = '$password'");
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  public function idUser(){
    return $this->id;
  }
}

class Select extends Database{
  public function selectUserById($id){
    $stmt = $this->connectPDO()->prepare("SELECT * FROM admin WHERE id = $id");
    return $stmt->execute();
  }
}
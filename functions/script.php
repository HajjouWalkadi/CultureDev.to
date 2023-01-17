<?php

include '../classes/database.php';

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
        $stmt = $this->connectPDO()->prepare( "INSERT INTO admin VALUES('', '$username', '$email', '$password')");
        $stmt->execute();
        header("Location: signin.php");
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
  public function login($usernameemail, $password){
    $stmt = $this->connectPDO()->prepare("SELECT * FROM admin WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $stmt->execute();

    if($stmt->rowCount() > 0){
      if($password == $stmt["password"]){
        $this->id = $stmt["id"];
        return 1;
        // Login successful
      }
      else{
        return 10;
        // Wrong password
      }
    }
    else{
      return 100;
      // User not registered
    }
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
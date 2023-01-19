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

  public function login($email, $password){
    $stmt = $this->connectPDO()->prepare("SELECT * FROM admin WHERE email = '$email' AND password = '$password' ");
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    // print_r( $result);
    if($stmt->rowCount()>0){
        $this->id = $result["id"];
        $_SESSION['uuuuuuuuuuuuuuuuuuuuuu'] = $result["id"];
        echo $_SESSION['uuuuuuuuuuuuuuuuuuuuuu'];
        header('Location: ../pages/dashboard.php');
        return 1;
     }else return 0;
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
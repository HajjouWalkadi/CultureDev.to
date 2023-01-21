<?php
require '../functions/script.php';

// if(!empty($_SESSION["id"])){
//   header("Location: signin.php");
// }

$login = new Login();

if(isset($_POST["login"])){
  $result = $login->login($_POST["email"], $_POST["password"]);
  if(isset($result)){
    $_SESSION['user_name'] = $result['username'];
    header('location:../pages/dashboard.php');
    die(var_dump($_SESSION));
  }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	  <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    <title>Log In</title>
</head>
<!-- <body class="bgimage row m-0"> -->
  <body class="bgcolor row m-0">

<!-- <?php if (isset($_SESSION['loginErrorMessage'])): ?>
            <div class="d-flex justify-content-center">
                <div class="alert alert-danger alert-dismissible fade show mt-5 w-25">
                    <strong>Error : </strong>
                    <?php   
                    echo $_SESSION['loginErrorMessage'];
                    unset($_SESSION['loginErrorMessage']);
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        <?php endif ?> -->
      
    <form class="col-lg-4 col-md-5 col-11 m-auto p-2 px-4 loginform" action="signin.php" method="post">
      <!-- Email input -->
      <h1 class="text-center mt-2">Log In</h1>

      <div class="form-outline mb-4">
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your address email"/>
        <label class="form-label" for="formEmail">Email address</label>
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" id="password" name="password" class="form-control" placeholder="Password"/>
        <label class="form-label" for="formPassword">Password</label>
      </div>
      <div class="form-group">
          <!-- <?php if(isset($_SESSION['loginErrorMessage'])){  ?>
              <span class="text-danger"><?$_SESSION['createdAccount'] ?></span>
          <?php } session_destroy(); ?> -->
      </div>
      <!-- Submit button -->
      <button type="submit" name="login" class="btn btn-primary btn-block mb-4 text-center col-4 offset-4">Log in</button>


      <!-- Register buttons -->
      <div class="text-center">
        <p>Not a member ? <a href="../authentication/signup.php"> Sign Up</a></p>
        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-facebook-f"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-google"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
          <i class="fab fa-github"></i>
        </button>
      </div>
    </form>
<script src="../assets/js/script.js"></script>
</body>
</html>
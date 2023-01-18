<?php
include_once '../functions/script.php';
// require '../functions/script.php';
$_SESSION = [];
// session_unset();
session_destroy();
header("Location: ../authentication/signin.php");
<?php
require '../functions/script.php';
$_SESSION = [];
session_unset();
session_destroy();
header("Location: ../authentication/signin.php");
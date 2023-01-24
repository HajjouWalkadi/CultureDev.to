<?php
include_once '../functions/script.php';
$_SESSION = [];
session_destroy();
header("Location: ../authentication/signin.php");
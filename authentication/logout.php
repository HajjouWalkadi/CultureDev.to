<?php
include_once '../functions/script.php';

session_destroy();
header("Location: ../authentication/signin.php");
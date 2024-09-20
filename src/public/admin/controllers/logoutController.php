<?php
require_once '../config/auth.php';

logout();
header("Location: ../views/login.php");
?>
<?php
require_once "../config/db.php";
require "../config/userAuth.php";

if (isLoggedIn()) {
    logout();
    header('Location: ../index.php');
}
?>
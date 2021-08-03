<?php
//PHP code to process login

namespace Jerome;

use \Jerome\User;
if(! empty($_POST["login"])) {
    session_start();
    $username = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    require_once (__DIR__ . "./class/user.php");

    $user = new User();
    $isLoggedIn = $user->processLogin($username, $password);
    if(! $isLoggedIn) {
        $_SESSION["errorMessage"] = "Invalid Credentials";
    }
    header("location: ./index.php");
    exit();
}
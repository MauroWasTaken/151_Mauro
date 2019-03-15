<?php
if(!isset($_SESSION)){
    session_start();
}
require 'controler/controler.php';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case "snows":
            require "view/snows.php";
            break;
        case "openLogin":
            require "view/loginView.php";
            break;
        case 'login' :
            login($_POST);
            break;
        case "logout":
            logout();
            break;
        case "openRegister":
            require "view/register.php";
            break;
        case "register":
            register($_POST);
            break;
        default :
            sendHome();
            break;
    }
} else {
    sendHome();
}
?>
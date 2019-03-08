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
        case "login":
            require "view/loginView.php";
            break;
        case 'register' :
            login($_POST);
            break;
        case "logout":
            logout();
            break;
        default :
            sendHome();
            break;
    }
} else {
    sendHome();
}
?>
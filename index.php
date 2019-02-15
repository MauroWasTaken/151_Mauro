<?php
require 'controler/controler.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'login' :

            break;
        default :
            sendHome();
            break;
    }
} else {
    sendHome();
}
?>
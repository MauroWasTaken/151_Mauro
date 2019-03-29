<?php
/**
 * Created by PhpStorm.
 * User: Mauro-Alexandre.COST
 * Date: 08.03.2019
 * Time: 10:30
 */
ob_start();
$titre="RentASnow - Accueil";

 print $snowList;
$contenu = ob_get_clean();
require "gabarit.php";
?>

<?php
/**
 * Created by PhpStorm.
 * User: Mauro-Alexandre.COST
 * Date: 08.03.2019
 * Time: 10:30
 */
require 'index.php';
ob_start();
$titre="RentASnow - Accueil";
?>
<table class="table textcolor">
    <tr>
        <th>Code</th>
        <th>Marque</th>
        <th>Modèle</th>
        <th>Longueur</th>
        <th>Prix</th>
        <th>Disponiblité</th>
        <th>Photo</th>
    </tr>
    <?php print fillSnows(); ?>
</table>
<?php
$contenu = ob_get_clean();
require "gabarit.php";
?>

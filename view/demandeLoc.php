<?php
/**
 * Created by PhpStorm.
 * User: Pascal.BENZONANA
 * Date: 08.05.2017
 * Time: 09:16
 */
// tampon de flux stocké en mémoire
$title = 'Rent A Snow - Demande de location';

ob_start();
?>
    <h2>Demande de location</h2>
    <article>
        <h4>Votre choix</h4>
        <table class="table">
            <tr>
                <th>Code</th>
                <th>Marque</th>
                <th>ModÃ¨le</th>
                <th>Longueur</th>
                <th>Prix</th>
                <th>En stock</th>
            </tr>
            <tr>
                <?php
                foreach ($snowsResults as $result) : ?>
                    <td><?= $result['Code']; ?></td>
                    <td><?= $result['Brand']; ?></td>
                    <td><?= $result['model']; ?></td>
                    <td><?= $result['length']; ?> cm</td>
                    <td>CHF <?= $result['price']; ?>.- par jour</td> <!-- Prices are not float -->
                    <td><?= $result['qtyAvailable']; ?></td>
                <?php endforeach;?>
            </tr>
        </table>
        <br/>
        <h4>Votre demande</h4>
        <form class="form" method="POST" action="index.php?action=updateCart&code=<?= $result['Code']; ?>">

            <table class="table">
                <tr>
                    <td>QuantitÃ© : </td><td><input type="number" placeholder="Entrez la quantitÃ©" name="inputQuantity" required  value="" required><td>
                </tr>
                <tr>
                    <td>Nombre de jours : </td><td><input type="number" placeholder="Entrez le nombre de jours" name="inputDays" value="" required /></td>
                </tr>
                <tr>
                    <td><input class="btn" type="submit" value="Mettre dans le panier" /></td><td><input type="reset" class="btn" value="Effacer"/>
                    </td>
                </tr>
            </table>
        </form>
    </article>
<?php
$contenu = ob_get_clean();
require "gabarit.php";
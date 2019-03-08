<?php
/**
 * Created by PhpStorm.
 * User: Pascal.BENZONANA
 * Date: 08.05.2017
 * Time: 09:16
 */
// tampon de flux stocké en mémoire
ob_start();
$titre="RentASnow - Accueil";
?>
        <form method="post" name="formRegister" action="../index.php?action=register">
            <div class="form-group">
                <label for="pseudo">Pseudo *</label>
                <input type="text" class="form-control" id="pseudo" name="inputPseudo" aria-describedby="pseudoHelp" placeholder="Enter pseudo" required>
            </div>
            <div class="form-group">
                <label for="inputPassword">Password *</label>
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

<?php
$contenu = ob_get_clean();
require "gabarit.php";
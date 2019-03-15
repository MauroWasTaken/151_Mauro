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
        <form method="post" name="formRegister" action="../index.php?action=login">
            <div class="form-group">
                <label for="userEmail"><b>Email</b></label>
                <input type="email" placeholder="Place email address" name="inputUserEmailAddress" required>
            </div>
            <div class="form-group">
                <label for="inputPassword">Password *</label>
                <input type="password" class="form-control" id="inputPassword" name="inputUserPassword" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>

<?php
$contenu = ob_get_clean();
require "gabarit.php";
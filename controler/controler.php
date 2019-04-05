<?php
/**
 * Author   : nicolas.glassey@cpnv.ch
 * Project  : 151_2019_ForStudents
 * Created  : 05.02.2019 - 18:40
 *
 * Last update :    [01.12.2018 author]
 *                  [add $logName in function setFullPath]
 * Git source  :    [link]
 */

function sendHome(){
    require "view/home.php";
}
function login($loginRequest)
{
    if(isset($loginRequest["inputUserEmailAddress"]) && isset($loginRequest["inputUserPassword"]))
    {
        $userEmail = $loginRequest["inputUserEmailAddress"];

        $userPassword = $loginRequest["inputUserPassword"];

        require "model/userManagement.php";
        if (isLoginCorrect($userEmail, $userPassword))
        {
            $_SESSION["userEmail"] = $userEmail;
            $_SESSION["userType"]=getUserType($userEmail)[0][0];
            $_GET["action"] = "home";
            require "view/home.php";
        }
        else
        {
            require "view/loginView.php";
        }

    }
    else
    {
        $_GET["action"] = "login";
        require "view/loginView.php";
    }
}
function logout(){
    // destroy the session
    $_SESSION=array();
    session_destroy();
    $_GET["action"] = "home";
    sendHome();
}
function fillSnows(){
    require "model/userManagement.php";

    $tableau=getSnows();
    if($_SESSION["userType"]==1 ) {
        $snowList="<table class=\"table textcolor\"><tr><th>Code</th><th>Marque</th><th>Modèle</th><th>Longueur</th><th>Prix</th><th>Disponiblité</th><th>Photo</th></tr>";
        foreach ($tableau as $snow) {
            $snowList = $snowList . "<tr>";
            $snowList = $snowList . "<th>" . $snow[0] . "</th><th>" . $snow[1] . "</th><th>" . $snow[2] . "</th><th>" . $snow[3] . "</th><th>" . $snow[4] . "</th><th>" . $snow[5] . "</th><th><img src=\"view/images/" . $snow[0] . "_small.jpg\" alt=\"" . $snow[0] . "\"  height:20%></th>";
            $snowList = $snowList . "</tr>";
        }
        $snowList = $snowList."</table>";
    }else{
        $snowList="";
        foreach ($tableau as $snow) {
            $snowList = $snowList . "<ul class=\"thumbnails\"><li class=\"span3\"><div class=\"thumbnail\">";
            $snowList = $snowList . "<a href=\"view/images/" . $snow[0] . ".jpg\" target=\"blank\"><img src=\"view/images/" . $snow[0] . "_small.jpg\" alt=\"" . $snow[0] . "\"></a> <div class=\"caption\">";
            $snowList = $snowList . '<h3><a href="index.php?action=displayASnow&amp;code=' . $snow[0] . '">' . $snow[0] . '</a></h3>';
            $snowList = $snowList . "<p><strong>Marque :</strong>" . $snow[1] . "</p>";
            $snowList = $snowList . "<p><strong>Modèle :</strong>" . $snow[2] . "</p>";
            $snowList = $snowList . "<p><strong>Longueur :</strong>" . $snow[3] . "</p>";
            $snowList = $snowList . "<p><strong>Prix :</strong> CHF " . $snow[4] . ".- / jour</p>";
            $snowList = $snowList . "<p><strong>Disponibilité :</strong>" . $snow[5] . "</p>";
            $snowList = $snowList . "<p><a href=\"index.php?action=DemanderLoc&code=" . $snow[0] . "\" class=\"btn btn-primary\">Louer ce snow</a></p></div></div></li>";
        }
    }

    require "view/snows.php";

}
function register($registerRequest){
    if(isset($registerRequest["inputUserEmailAddress"]) && isset($registerRequest["inputUserPassword1"])&&isset($registerRequest["inputUserPassword2"])) {
        if ($registerRequest["inputUserPassword1"] == $registerRequest["inputUserPassword2"]) {
            $userEmail = $registerRequest["inputUserEmailAddress"];

            $userPassword = $registerRequest["inputUserPassword1"];

            require "model/userManagement.php";
            if (isRegisterCorrect($userEmail, $userPassword)) {
                $_SESSION["userEmail"] = $userEmail;
                $_SESSION["userType"]=getUserType($userEmail)[0][0];
                $_GET["action"] = "home";
                require "view/home.php";
            } else {
                $_GET["error"] = "Error logging";
                require "view/register.php";
            }
        } else {
            require "view/register.php";
        }
    }
}
function demanderLoc($code){
    require "model/userManagement.php";
    $snowsResults=array();
    $snowsResults[count($snowsResults)]=getSnow($code)[0];

    require "view/demandeLoc.php";
}
function addOnCart($code,$data){
    $array=getSnow($code);
   // inputQuantity
   // inputDays
}
?>
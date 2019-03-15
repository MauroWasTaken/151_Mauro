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

        //$userPassword = password_hash($loginRequest["inputUserPassword"], PASSWORD_DEFAULT);

        //$userPassword = hash("sha256", $loginRequest["inputUserPassword"]);
        //$userPassword = hash("sha256", $loginRequest["inputUserPassword"]);

        require "model/userManagement.php";
        if (isLoginCorrect($userEmail, $userPassword))
        {
            $_SESSION["userEmail"] = $userEmail;
            require "view/home.php";
        }
        else
        {
            $_SESSION["userEmail"] = "Error logging";
            $_GET["action"] = "login";
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
    sendHome();
}
function fillSnows(){
    $temptab="";
    $tableau=getSnows();
    foreach($tableau as $snow){
        $temptab=$temptab . "<tr>";
        foreach($snow as $data){
            $temptab="<th>".$temptab ."</th>";
        }
        $temptab=$temptab . "</tr>";
    }
    return $temptab;
}
function register($registerRequest){
    if(isset($registerRequest["inputUserEmailAddress"]) && isset($registerRequest["inputUserPassword1"])&&isset($registerRequest["inputUserPassword2"])) {
        if ($registerRequest["inputUserPassword1"] == $registerRequest["inputUserPassword2"]) {
            $userEmail = $registerRequest["inputUserEmailAddress"];

            $userPassword = $registerRequest["inputUserPassword1"];

            //$userPassword = password_hash($loginRequest["inputUserPassword"], PASSWORD_DEFAULT);

            //$userPassword = hash("sha256", $loginRequest["inputUserPassword"]);
            //$userPassword = hash("sha256", $loginRequest["inputUserPassword"]);

            require "model/userManagement.php";
            if (isRegisterCorrect($userEmail, $userPassword)) {
                $_SESSION["userEmail"] = $userEmail;
                require "view/home.php";
            } else {
                $_SESSION["userEmail"] = "Error logging";
                $_GET["action"] = "login";
                require "view/loginView.php";
            }
        } else {
            $_GET["action"] = "login";
            require "view/loginView.php";
        }
    }
}
?>
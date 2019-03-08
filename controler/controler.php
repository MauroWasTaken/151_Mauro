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
require 'model/model.php';
function sendHome(){
    require "view/home.php";
}
function login($Données){
   // if(getUserLogin($Données)!=NULL) {
        $_Session["Username"] = $Données["inputPseudo"];
    //}
    $_GET["action"]="home";
    require'index.php';
}
function logout(){
    // destroy the session
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
?>
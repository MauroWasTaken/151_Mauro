<?php
/**
 * Created by PhpStorm.
 * User: Loïc.Gavin
 * Date: 13.02.2019
 * Time: 14:05
 */

function isLoginCorrect($userEmailAddress, $userPassword)
{
    $isLoginCorrect = false;

    $strSep = '\'';

    //$loginQuery = "SELECT pseudo FROM users WHERE userEmailAddress = ".$strSep.$userEmailAddress.$strSep." AND userPassword = ".$strSep.$userPassword.$strSep;
    $loginQuery = "SELECT pseudo, userPsw FROM users WHERE userEmailAddress = ".$strSep.$userEmailAddress.$strSep;

    require "model/dbConnector.php";

    $queryResult = executeQuery($loginQuery);

    if(count($queryResult) == 1)
    {
        $userHashedPassword = $queryResult[0]["userPsw"];

        //$isLoginCorrect = password_verify($userPassword, $userHashedPassword);
        if($userPassword==$userHashedPassword){
            $isLoginCorrect=true;
        }
    }

    return $isLoginCorrect;
}
function isRegisterCorrect($userEmailAddress, $userPassword)
{
    $isRegisterCorrect = false;

    $strSep = '\'';
    $uniqueQuery = "SELECT pseudo, userPsw FROM users WHERE userEmailAddress = ".$strSep.$userEmailAddress.$strSep;

    require "model/dbConnector.php";

    $queryResult = executeQuery($uniqueQuery);

    if(count($queryResult) == 0)
    {


    }

    return $isRegisterCorrect;
}
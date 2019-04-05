<?php
/**
 * Created by PhpStorm.
 * User: Loïc.Gavin
 * Date: 13.02.2019
 * Time: 14:05
 */

/**
 * @param $userEmailAddress
 * @param $userPassword
 * @return bool
 */
function isLoginCorrect($userEmailAddress, $userPassword)
{
    $isLoginCorrect = false;

    $strSep = '\'';
    $loginQuery = "SELECT pseudo, userPsw FROM users WHERE userEmailAddress = ".$strSep.$userEmailAddress.$strSep;

    require "model/dbConnector.php";

    $queryResult = executeQuery($loginQuery);

    if(count($queryResult) == 1)
    {
        $userHashedPassword = $queryResult[0]["userPsw"];

        $isLoginCorrect = password_verify($userPassword, $userHashedPassword);
    }

    return $isLoginCorrect;
}

/**
 * @param $userEmailAddress
 * @param $userPassword
 * @return bool
 */
function isRegisterCorrect($userEmailAddress, $userPassword)
{
    $isRegisterCorrect = false;

    $strSep = '\'';
    $uniqueQuery = "SELECT pseudo, userPsw, type FROM users WHERE userEmailAddress = ".$strSep.$userEmailAddress.$strSep;

    require "model/dbConnector.php";

    $queryResult = executeQuery($uniqueQuery);

    if(count($queryResult) == 0)
    {

        $userHashedPassword = password_hash ( $userPassword,PASSWORD_DEFAULT);
        $insertionQuery="INSERT INTO users(userEmailAddress,userPsw) VALUES('".$userEmailAddress."','".$userHashedPassword."');";
        executeQuery($insertionQuery);
        $isRegisterCorrect=true;
    }

    return $isRegisterCorrect;
}

/**
 * @return array|null
 */
function getSnows()
{
    require "model/dbConnector.php";
    $snowList = null;
    $snowQuery = "SELECT Code,Brand,model,length,price,qtyAvailable FROM snowboards";
    $snowList = executeQuery($snowQuery);
    return $snowList;

}

/**
 * @param $userEmailAddress
 * @return array|null
 */
function getUserType($userEmailAddress){
    $strSep = '\'';
    $loginQuery = "SELECT type FROM users WHERE userEmailAddress = ".$strSep.$userEmailAddress.$strSep;
    $queryResult = executeQuery($loginQuery);
    return $queryResult;
}
function getSnow($code){
    $snowList = null;
    require "model/dbConnector.php";
    $snowQuery = "SELECT Code,Brand,model,length,price,qtyAvailable FROM snowboards WHERE Code='".$code."'";
    $snowList = executeQuery($snowQuery);
    return $snowList;
}
function UpdateChart($item,$cart,$qtySnows,$qtyDays){
    $updatedCart=array();
    if($cart!=NULL){
        $updatedCart=$cart;
    }
    $newLine=array(["code"] => $item[0],["dateD"] => $qtySnows,["uQty"] => $qtyDays,["uNbD"] => orange);
    return $updatedCart;
}
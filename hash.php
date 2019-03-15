<?php
/**
 * Created by PhpStorm.
 * User: Mauro-Alexandre.COST
 * Date: 15.03.2019
 * Time: 10:07
 */
    $i = password_hash ( "azerty",PASSWORD_DEFAULT);
echo $i;
if(password_verify ( "azerty" ,$i)){
    echo " good";
}else{
    echo " bad";
}
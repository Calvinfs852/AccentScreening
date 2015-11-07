<?php
/**
 * Created by PhpStorm.
 * User: Calvin Scott
 * Date: 11/7/2015
 * Time: 3:36 PM
 */

$password = $_POST["password"];
//hardcoded password for v1
$correct = "testpswd";
$hashed = password_hash($correct, PASSWORD_DEFAULT);
if(password_verify($password, $hashed))
{
    header('location: adminhome.php');
}else{

    header('location: login.php');
}

<?php
//signin
require_once('../settings.php');
require_once('../theme/header.php');

if(count($_SESSION)>0 && is_numeric($_SESSION['ID'])){
    header('location:../index.php');
    die();
}

if(count($_POST)>0){
    require_once('auth.php');
    if(signin($connection,$_POST['email'],$_POST['password'])){
        header('location:../index.php');
        die();
    }
    else echo 'Signin Failed';
}
?>

<form method="POST">
    <input name="email" type="email"/>
    <input name="password" type="password"/>
    <button type="submit">Sign In</button>
</form>


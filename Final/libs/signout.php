<?php
//signout
require_once('../settings.php');
require_once('../theme/header.php');

if(count($_SESSION)>0 && is_numeric($_SESSION['ID'])){
    require_once('auth.php');
    signout();
}
header('location: signin.php');
die();

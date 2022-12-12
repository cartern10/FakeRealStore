<?php
//auth.php
require_once('../settings.php');


function signup($connection,$email,$password){
	$query=$connection->prepare('SELECT * FROM users WHERE email=?');
	$query->execute([$email]);
	if($query->rowCount()>0) return false;
	$query=$connection->prepare('INSERT INTO users(email,password) VALUES(?,?)');
	$query->execute([$email,password_hash($password,PASSWORD_DEFAULT)]);
	return true;
}

function signin($connection,$email,$password){
	$query=$connection->prepare('SELECT * FROM users WHERE email=?');
	$query->execute([$email]);
	if($query->rowCount()==0) return false;
	$result=$query->fetch();
	if($result['status']==-1) return false;
	if(!password_verify($password,$result['password'])) return false;
	$_SESSION['ID']=$result['ID'];
	$_SESSION['role']=$result['role'];
	$_SESSION['firstname']=$result['firstname'];
	$_SESSION['lastname']=$result['lastname'];
	return true;
}

function signout(){
	$_SESSION=[];
	session_destroy();
}
<?php
//index.php
require_once('../settings.php');

if(isset($_SESSION['ID'])){
	$query=$connection->prepare('SELECT * FROM users WHERE ID=?');
	$query->execute([$_SESSION['ID']]);
	$user=$query->fetch();
	if(!($user['status']==2)){
        
		echo'This is an admin only page, please return to the store';
		die();
	}
}
else{
	echo'This is an admin only page, please return to the store';
	die();
}

?>
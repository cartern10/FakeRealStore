<?php
//modify.php
require_once('../settings.php');
require_once('verify_if_admin.php');
if(isset($_SESSION['ID'])){
	$query=$connection->prepare('SELECT * FROM categories WHERE ID=?');
	$query->execute([$_SESSION['ID']]);
	$user=$query->fetch();
	if(!$user['status']=2){
		echo'This is an admin only page, please return to the store';
		die();
	}
}
else{
	echo'This is an admin only page, please return to the store';
	die();
}
if(count($_POST)>0){
	$query=$connection->prepare('UPDATE categories SET name=? WHERE ID=?');
	$query->execute([$_POST['name'],$_GET['id']]);
	header("location:admin.php");
}
$query=$connection->prepare('SELECT * FROM categories WHERE ID=?');
$query->execute([$_GET['id']]);
$category=$query->fetch();

?>

<form method="POST" >
Category name: <input name="name" type="text" value="<?= $category['name'] ?>" />
<button type="submit">Submit</button>
</form>
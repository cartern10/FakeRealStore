<?php
//signup

require_once('../settings.php');
require_once('../theme/header.php');

$query=$connection->prepare('SELECT * FROM users WHERE ID = ?');
$query->execute([$_SESSION['ID']]);
$user = $query->fetch();

echo 'Thank you '.$user['firstname'].' '.$user['lastname'].' for your purchase';
echo '</br>';
echo'You Have Completed Your Order';
echo '</br>';
echo '</br>';
echo '</br>';



?>

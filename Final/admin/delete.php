<?php
//delete.php
require_once('../settings.php');
require_once('../theme/header.php');
require_once('verify_if_admin.php');

// Simple query
$query=$connection->prepare('DELETE FROM categories WHERE ID=?');
$query->execute([$_GET['id']]); 
echo 'The category has been deleted.';

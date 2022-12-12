<?php
require_once('../settings.php');
require_once('../theme/header.php');


$query=$connection->prepare('SELECT * FROM items WHERE ID=?');
$query->execute([$_GET['id']]);
$item=$query->fetch();
echo '<h1>'.$item['name'].'</h1>';
echo '<img src="../'.$item['image_name'].'" height="180" width="298" alt="image">';
echo '</br>';
echo $item['description'];
echo '</br>';
echo '$';
echo $item['price'];
echo '</br>';
echo '<a href="../cart_and_purchase/cart.php?id='.$item['ID'].'">Purchase</a>';
echo '</br>';
echo '</br>';
echo'Quantity left: '.$item['quantity'];

require_once('../theme/footer.php');
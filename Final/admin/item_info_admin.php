<?php
require_once('../settings.php');
require_once('../theme/header.php');
require_once('verify_if_admin.php');


$query=$connection->prepare('SELECT * FROM items WHERE ID=?');
$query->execute([$_GET['id']]);
$item=$query->fetch();

echo '<h1>'.$item['name'].'</h1>';
echo $item['description'];
echo '</br>';
echo '$';
echo $item['price'];
echo '</br>';
echo '<a href="../cart_and_purchase/cart.php?id='.$item['ID'].'">Purchase</a>';



$query=$connection->prepare('SELECT * FROM items WHERE ID=?');
$query->execute([$_GET['id']]);
$item=$query->fetch();

if(count($_POST)>0){
	$query=$connection->prepare('UPDATE items SET name=?,price=?,quantity=?,visibility=? WHERE ID=?');
    $query->execute([$_POST['name'],$_POST['price'],$_POST['quantity'],$_POST['visibility'],$_GET['id']]);
}
if(array_key_exists('delete_button', $_POST)){
    delete_item($connection);
 }
function delete_item($connection){
    $query=$connection->prepare('DELETE FROM items WHERE ID = ?');
    $query->execute([$_GET['id']]);
    header("location:admin.php");
}
?>

<br>
<form method="POST" >
Item Name: <input name="name" type="text" value="<?= $item['name'] ?>" />
</br>
Item Price: <input name="price" type="text" value="<?= $item['price'] ?>" />
</br>
Item Quantity: <input name="quantity" type="text" value="<?= $item['quantity'] ?>" />
</br>
Item Visability: <input name="visibility" type="text" value="<?= $item['visibility'] ?>" />
</br>
<button type="submit">Change</button>

<form method="post">
  <input type="submit" class="btn btn-danger" name="delete_button" value="Delete Item" >
</form>

</form>

<?php

require_once('../theme/footer.php');

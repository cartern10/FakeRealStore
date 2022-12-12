<?php
require_once('../settings.php');

require_once('../theme/header.php');

if(!(count($_SESSION)>0 && is_numeric($_SESSION['ID']))){
  echo 'You can only add things to the cart when you are signed in';
  die;
}

// Set the initial cart to an empty array
$cart = [];
$total_value = 0;
// Check if the cart exists in the session
if (isset($_SESSION['cart'])) {
  // If it exists, set the cart variable to the value stored in the session
  $cart = $_SESSION['cart'];
}

// Check if the form has been submitted
if (isset($_POST) && !isset($_POST['clear_button']) && !isset($_POST['purchase_cart'])) {
  // Check if there is an ID in the URL
  if (isset($_GET['id'])) {
    $query=$connection->prepare('SELECT * FROM items WHERE ID=?');
    $query->execute([$_GET['id']]);
    $item=$query->fetch();
    $item_name = $item['name'];
    $item_price = $item['price'];
    $item_id = $item['ID'];

    // Check if the item already exists in the cart
    if (isset($cart[$item_id]['quantity'])) {
      // If it does, add the quantity to the existing value
      if(($cart[$item_id]['quantity'] + 1)>$item['quantity']){
        echo'<div class="alert alert-danger" role="alert">
        You have the maximum number of this item in your cart
        </div>';
      }
      else{
        $cart[$item_id]['quantity'] += 1;
      }
    }
    else {
      // If it doesn't, add the item and quantity to the cart
      $cart[$item_id] = [
        'name' => $item_name,
        'id' => $item_id,
        'price' => $item_price,
        'quantity' => 1
      ];

    }
    // Save the updated cart to the session
    $_SESSION['cart'] = $cart;
  }
}

if(array_key_exists('clear_button', $_POST)){
   clear_cart();
}
if(array_key_exists('purchase_cart', $_POST)){
  purchase_cart();
}

// Display the cart
echo '<h1>Shopping Cart</h1>';
echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Item Name</th>';
echo '<th>Price</th>';
echo '<th>Quantity</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
foreach ($cart as $item_id => $item) {
  $total_value += $item['price'] * $item['quantity'];
  echo '<tr>';
  echo "<td>{$item['name']}</td>";
  echo "<td>{$item['price']}</td>";
  echo "<td>{$item['quantity']}</td>";
  echo '</tr>';
}
echo '<tr>';
echo '<td colspan="2">Total value:</td>';
echo '<td>'.$total_value.'</td>';
echo '</tr>';
echo '</tbody>';
echo '</table>';
echo '</br>';

function clear_cart(){
    unset($_SESSION['cart']);
}

function purchase_cart(){
  header('location:checkout.php');
}
?>
<form method="post">
  <input type="submit" class="btn btn-success" name="purchase_cart" value="Purchase" >
  <input type="submit" class="btn btn-danger" name="clear_button" value="Click Twice To Clear Cart" >
</form>

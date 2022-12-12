<?php
require_once('../settings.php');
require_once('../theme/header.php');
require_once('verify_if_admin.php');



$order_query=$connection->prepare('SELECT * FROM user_order');
$order_query->execute();

echo'<table>';
    echo'<tr>';
    echo'<th>Order ID</th>';
    echo'<th>Transaction ID</th>';
    echo'<th>User ID</th>';
    echo'<th>Product ID</th>';
    echo'<th>Quantity</th>';
    echo'<th>Status</th>';

  while($order=$order_query->fetch()){
    $order_id = $order['id'];
    $order_transaction = $order['transaction_id'];
    $user_id = $order['user_id'];
    $product_id = $order['product_id'];
    $quantity = $order['quantity'];
    $status = $order['status'];

  echo'<tr>';
  echo'<th>'.$order_id.'</th>';
  echo'<th>'.$order_transaction.'</th>';
  echo'<th>'.$user_id.'</th>';
  echo'<th>'.$product_id.'</th>';
  echo'<th>'.$quantity.'</th>';
  echo'<th>'.$status.'</th>';
  echo'</tr>';
}
echo'</table>';


$order_query=$connection->prepare('SELECT * FROM user_order');
$order_query->execute();

echo'<form method="POST">';
    echo'<label for="order_id">Change the Status of Order ID</label>';
    echo '<select name="order_id" id="order_id">';
    while($order=$order_query->fetch()){
        $order_id = $order['id'];
        echo'<option value="'.$order_id.'">'.$order_id.'</option>';
    }
    echo'</select>';
    echo'<label for="status">to </label>';
    echo '<select name="status" id="status">';
        echo'<option value="ordered">ordered</option>';
        echo'<option value="in progress">in progress</option>';
        echo'<option value="shipped">shipped</option>';
        echo'<option value="delivered">delivered</option>';
    echo'</select>';
    echo'</br>';
    echo'<input type="submit" value="Submit">';
echo'</form>';

<?php
//signup

require_once('../settings.php');
require_once('../theme/header.php');

if (isset($_POST['submit'])) {
    // Get the form data
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $address = $_POST['address'];
    $creditCard = $_POST['creditCard'];

    // Update the user's information in the database
    $query = $connection->prepare('UPDATE users SET firstname = ?, lastname = ?, address = ? WHERE ID = ?');
    $query->execute([$first_name,$last_name,$address, $_SESSION['ID']]);


    // Retrieve all the IDs from the user_order table
    $query = $connection->prepare('SELECT ID FROM user_order');
    $query->execute();
    $IDs = $query->fetchAll(PDO::FETCH_COLUMN);

    // Find the maximum ID value
    $last_order = max($IDs);

    // Increment the maximum ID value to get the next ID
    $next_order = $last_order + 1;

    $item_array = $_SESSION['cart'];
    foreach($item_array as $item){

    $query=$connection->prepare('INSERT INTO user_order (transaction_id, user_id, product_id, quantity) VALUES (?, ?, ?, ?)');
    $query->execute([$next_order, $_SESSION['ID'],$item['id'],$item['quantity']]);

    foreach ($_SESSION['cart'] as $item_id => $item){
        $query = $connection->prepare('UPDATE items SET quantity = quantity - ? WHERE ID = ?');
        $query->execute([$item['quantity'], $item['id']]);
    }
    $_SESSION['cart']=[];

    }
    
    header('location:confirmation.php');

    

}


?>
<form method="post" action="">
    <label for="firstName">First name:</label><br>
    <input type="text" name="firstName" id="firstName"><br>
    <label for="lastName">Last name:</label><br>
    <input type="text" name="lastName" id="lastName"><br>
    <label for="address">Address:</label><br>
    <input type="text" name="address" id="address"><br>
    <label for="creditCard">Credit card:</label><br>
    <input type="text" name="creditCard" id="creditCard"><br><br>
    <input type="submit" name="submit" value="Submit">
    </form>
<?php
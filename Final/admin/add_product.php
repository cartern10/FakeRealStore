<?php

require_once('../settings.php');
	
require_once('../theme/header.php');


require_once('verify_if_admin.php');
//create.php

if(count($_POST)>0){
	$query=$connection->prepare('INSERT INTO items (category_ID, name, price, quantity, visibility, light_description, description) VALUES (?, ?, ?, ?, ? ,? ,?)');
    $query->execute([$_POST['category_ID'], $_POST['name'], $_POST['price'], $_POST['quantity'], $_POST['visibility'], $_POST['light_description'], $_POST['description']]);
}

?>

<form method="POST">
Category Number: <input name="category_ID" type="text" />
</br>
Item Name: <input name="name" type="text" />
</br>
Item Price: <input name="price" type="text" />
</br>
Item Quantity: <input name="quantity" type="text" />
</br>
Item Visibility: <input name="visibility" type="text" />
</br>
Item Light Description: <input name="light_description" type="text" />
</br>
Item Description: <input name="description" type="text" />
</br>
<button type="submit">Submit</button>
</form>
<?php

require_once('../theme/footer.php');
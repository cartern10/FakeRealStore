<?php

require_once('../settings.php');
	
require_once('../theme/header.php');

require_once('verify_if_admin.php');
//create.php

if(count($_POST)>0){
	$query=$connection->prepare('INSERT INTO categories (name,image_name) VALUES (?, ?)');
	$query->execute([$_POST['name'],'images/'.$_POST['image']]);
}

?>

<form method="POST">
Category name: <input name="name" type="text" />
Image name: <input name="image" type="text" />
<button type="submit">Submit</button>
</form>
<?php
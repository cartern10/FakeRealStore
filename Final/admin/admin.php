<?php

//index.php
require_once('../settings.php');

require_once('../theme/header.php');

require_once('verify_if_admin.php');


// Simple query
$result=$connection->query('
	SELECT categories.ID,categories.name,COUNT(items.ID) AS items_count 
	FROM categories
	LEFT JOIN items ON items.category_ID=categories.ID
	GROUP BY categories.ID');
?>
<div class="container">
<h1>Admin Page</h1>
<h2>Categories</h2>
<?php
echo '<a href="create.php">Create category</a>';
echo'</br>';
echo '<table>';
while($category=$result->fetch()){
	echo '<tr>
		<td>'.$category['ID'].'</td>
		<td><a href="detail_admin.php?id='.$category['ID'].'">'.$category['name'].'</a></td>
		<td>'.$category['items_count'].'</td>
		<td><a href="delete.php?id='.$category['ID'].'">Delete category</a></td>
		<td> | <td>
		<td><a href="modify.php?id='.$category['ID'].'">modify category</a><td>
	</tr>';
}
echo '</table>';
?>
<form action="add_product.php">
  <input type="submit" class="btn btn-primary" name="add_product" value="Add New Product" >
</form>

<?php


require_once('../theme/footer.php');
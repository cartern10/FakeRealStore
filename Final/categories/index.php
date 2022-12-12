<?php

//index.php
require_once('../settings.php');

require_once('../theme/header.php');
// Simple query
$result=$connection->query('
	SELECT categories.image_name,categories.ID,categories.name,COUNT(items.ID) AS items_count 
	FROM categories
	LEFT JOIN items ON items.category_ID=categories.ID
	GROUP BY categories.ID');
?>
<div class="container">
<h1>RealFakeStore</h1>
<h2>Categories</h2>
<div class="card-deck">
<?php
$count=-1;
while($category=$result->fetch()){ 
	$count++;
	if($count == 3){
	$count = 0;
	echo'</div>
	</br>
	<div class="card-deck">';
	}
	?>
	<div class="card" style="width: 30rem;">
		<img class="card-img-top" src="../<?php echo $category['image_name']?>"  alt="This is suppose to be an image">
			<div class="card-body">
    		<h5 class="card-title"><a href="detail.php?id=<?php echo $category['ID']?>"><?php echo $category['name']?></a></h5>
	</div>
</div>

<?php } ?>
</div>
<?php
require_once('../theme/footer.php');
?>

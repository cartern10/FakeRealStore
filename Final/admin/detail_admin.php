<?php
//detail.php
require_once('../settings.php');

require_once('../theme/header.php');

// Simple query
$query=$connection->prepare('SELECT * FROM categories WHERE ID=?');
$query->execute([$_GET['id']]);
$category=$query->fetch();
echo '<h1>'.$category['name'].'</h1>';

// Retrieve the list of items
$item_query=$connection->prepare('SELECT * FROM items WHERE category_ID=?');
$item_query->execute([$_GET['id']]);

if($item=$item_query->fetch()==0){
  echo 'Sorry there are no items available in this category';
}
$item_query=$connection->prepare('SELECT * FROM items WHERE category_ID=?');
$item_query->execute([$_GET['id']]);
// Display the items
?>
<div class="container">

<div class="card-deck">
<?php
$count=-1;
  while($item=$item_query->fetch()){
    if($item['quantity'] > 0){
      $count++;
      if($count == 3){
      $count = 0;
      echo'</div>
      </br>
      <div class="card-deck">';
      }
      ?>
	      <div class="card" style="width: 30rem;">
        		<img class="card-img-top" src="../<?php echo $item['image_name']?>" alt="This is suppose to be an image">

              <div class="card-body">
                  <h5 class="card-title"><a href="item_info_admin.php?id=<?php echo $item['ID']?>"><?php echo $item['name']?></a></h5>
                  <p class="card-text"><?php echo$item['light_description']?></p>
              </div>
            </div>
        <?php
        }
      }
  ?>
  </div>
<?php
require_once('../theme/footer.php');
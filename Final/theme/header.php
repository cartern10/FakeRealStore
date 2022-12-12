<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">RealFakeStore</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="//localhost/final/categories/index.php">Categories<span class="sr-only">(current)</span></a>
      
      <?php if(count($_SESSION)>0 && is_numeric($_SESSION['ID'])){ ?>
        <a class="nav-item nav-link active" href="//localhost/final/cart_and_purchase/cart.php">Cart</a>
        <a class="nav-item nav-link active" href="//localhost/final/libs/signout.php">Signout</a>
      <?php }
      if(!(count($_SESSION)>0 && is_numeric($_SESSION['ID']))){ ?>
      <a class="nav-item nav-link active" href="//localhost/final/libs/signin.php">Signin</a>
      <a class="nav-item nav-link active" href="//localhost/final/libs/signup.php">SignUp</a>
      <?php }
      if(isset($_SESSION['ID'])){
      $query=$connection->prepare('SELECT * FROM users WHERE ID=?');
      $query->execute([$_SESSION['ID']]);
      $user=$query->fetch();
      if(($user['status']==2)){ ?>
      <a class="nav-item nav-link active" href="//localhost/final/admin/admin.php">Admin Page</a>
      <a class="nav-item nav-link active" href="//localhost/final/admin/order_transaction.php">Manage Orders</a>
      <?php }} ?>
    </div>
  </div>
</nav>
  </body> 
</html>
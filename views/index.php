<?php require '../layouts/header.php';
      require '../controllers/database.php';
?>



<?php
/* Lekérdezés, vonatkozó inner joinnal ha van */
$product_query = "SELECT * FROM `products`";
if (isset($_GET["cat"]) && $_GET["cat"] != '#') {
  $product_query = $product_query ." Where type = '". $_GET["cat"]."'";
}

if (isset($_GET["filter"])) {
    $product_query = $product_query . " ORDER BY price ". $_GET["filter"];
}

$result3 = mysqli_query($connection, $product_query);
?>


<div class="landing-video">
    <video src="../assets/videos/pexels_videos.mp4" loop muted autoplay>

    </video>
</div>
  <div class="row">
        <form action="#" method="GET">
          <div class="col-2">
            <select name="filter" id="filter" class="form-select">
              <option value="" selected disabled>Kérlek válassz</option>
              <option value="asc">Ár szerint növekvő</option>
              <option value="desc">Ár szerint csökkenő</option>
            </select>
          </div>
          <div class="col-2">
              <button type="submit" name="submit" class="btn btn-warning">Szűrés</button>
              <input type="hidden" name="cat" value="<?php echo isset($_GET['cat']) ? $_GET['cat'] : "#" ?>">
          </div>
        </form>
      </div>
  </div>


<div class="row">
<?php

while ($row = mysqli_fetch_assoc($result3)) {
  echo ' <div class="col-lg-3 col-md-4 col-sm-6">
  <div class="card border-primary m-3">
    <img class="card-img-top img img-fluid" src="../assets/images/'.$row['picture'].'" alt="Placeholder">
    <div class="card-body">
      <h4 class="card-title text-truncate">'.$row['name'].'</h4>
      <p class="card-text text-truncate">'.$row['description'].'</p>
      <p class="mt-1 text-center text-success mt-1">
        Price: $ '.$row['price'].'
      </p>
      </div>

    <div class="mt-2 mb-2 text-center">
    <form action="../controllers/cart.php" method="POST">
          <input class="form-control" type="number" name="qty" id="qty" value="1">
          <button class="mt-2 cartIcon" name="submit" id="submit" type="submit"><i class="fa-solid fa-cart-shopping"></i></button>
          <input type="hidden" name="productId" id="productId" value="'.$row['id'].'">
    </form>
    </div>
  </div>
</div>';
}

?>  

<div class="row">
  <div class="col-12">
    <div class="table-responsive">
      <table class="table table-striped
      table-hover	
      table-borderless
      table-warning
      align-middle">
        <thead class="table-light">
          
          <tr>
            <th>Id</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php
            $total = 0;
            if (isset($_SESSION['cart'])) { /* HA van a sessionben kosár */
              
              foreach ($_SESSION['cart'] as $key => $product) {
                $total += $product['qty'] *$product['price'];
                echo'  <tr>
                <td scope="row">Item</td>
                <td>'.$product['name'].'</td>
                <td>'.$product['qty'].'</td>
                <td>'.$product['qty'] * $product['price'].'</td>
                <td>
                  <div class="row">
                    <div class="col-2">
                      <form action="#" method="POST">
                        <button class="actionButton"><i class="fa-solid fa-arrows-rotate me-3"></i></button>
                      </form>
                    </div>
                    <div class="col-2">
                      <form action="#" method="POST">
                        <button class="actionButton"><i class="fa-solid fa-trash"></i></td></button>
                      </form>
                    </div>
                    
                    
                  </div>           
              </tr>';
              }
            }
            
            ?>
          
            <td colspan="4">Összesen: </td>
            <td><?php echo "$".$total . " - ($" . $total*0.73 . " + VAT)" ?></td>
          </tbody>
          
      </table>
    </div>
    
  </div>
</div>

</div>

<?php require '../layouts/footer.php';?>
<?php require '../layouts/header.php';
      require '../controllers/database.php';
      

 
      
?>


<div class="row card">
  <div class="col-12">
    <div class="table-responsive">
     
          

            <table id="myTable" class="table table-striped
                table-hover	
                table-borderless
                table-warning
                align-middle display">
                <thead class="table-light">
                    <tr>
                        <th>Item(s)</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <?php 
                $total = 0;
                if (isset($_SESSION["cart"]))
                {
                    foreach ($_SESSION['cart'] as $key => $product) {
                        $total += $product['qty'] *$product['price'];
                        echo'  <tr>
                        <td scope="row">'.$product['id'].'</td>
                        <td>'.$product['name'].'</td>
                        <td>'.$product['qty'].'</td>
                        <td>'.$product['qty'] * $product['price'].'</td>
                        
                        
                            
                            
                                  
                    </tr>';
                    }
          

                }
                ?>
                </table>
    </div>
  </div>
</div>

<button><a href="index.php" class="btn">Back to store</a></button>
<button><a href="../controllers/order_data.php" class="btn">Continue</a></button>


    
<script>
	
let table = new DataTable('#myTable', {
    // options
});
</script>

<?php require '../layouts/footer.php'; ?>
    
    
 



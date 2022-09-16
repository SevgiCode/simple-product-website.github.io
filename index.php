<?php
include 'connect.php';
if(isset($_POST['delete-product-btn']))
{
    if(isset($_POST['delete-checkbox'])){
        foreach ($_POST['delete-checkbox'] as $delete_id)
        {
            mysqli_query($connect, "DELETE FROM product WHERE id='$delete_id'");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="title">Product List</h1>
    <div class="btn-group">
    <button><a href="add-product.php">Add Product</a></button>
    <form method="POST" action="">
    <input type="submit" name="delete-product-btn" id="delete-product-btn" value="delete" onclick="location.reload()">
    </div>
 <div class="div"></div>
    <div class="content">
    <?php
      $select_products = mysqli_query($connect, "SELECT * FROM `product` ") or die('query failed');
      if(mysqli_num_rows($select_products) > 0){
         while($row = mysqli_fetch_assoc($select_products)){
        
   ?>
    <div class="product-box">
   
    <input type="checkbox" name='delete-checkbox[]' value="<?php echo $row["id"] ?>">
   
    <div class="info">
        <h2><?php  echo (! empty($row['sku']) ? "SKU:" .$row['sku'] : "")?></h2>
        <h2><?php  echo (! empty($row['name']) ? "Name:" .$row['name'] : "")?></h2>
        <h3><?php  echo (! empty($row['price']) ? "Price:" .$row['price']. "$" : "")?></h3>
        <h4><?php  echo (! empty($row['size']) ? "Size:" .$row['size']. "MB" : "" )?></h4>
        <h5><?php  
        echo (! empty($row['height']) ? "Dimensions:" .$row['height'] : "")
        .(! empty($row['width']) ? "x  ".$row['width'] : "")
        .(! empty($row['length']) ? " x ".$row['length'] : "")
        
        ?>
        </h5>
        <h5><?php  echo (! empty($row['weight']) ? "Size:" .$row['weight']. "KG" : "" )?></h5>
      
    </div>
    
    </div>
     <?php
         }
        }else{
           echo '<p>no products added yet!</p>';
        }
        ?>
    </div>
    </form>
    <div class="div"></div>
    <h4 class="footer-text">Scandiweb Test Assignment</h4>
</body>
</html>
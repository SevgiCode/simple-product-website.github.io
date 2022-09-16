<?php
include 'connect.php';
if(isset($_POST['add_product'])){
  $sku = $_POST['sku'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $size = $_POST['size'];
  $height = $_POST['height'];
  $width = $_POST['width'];
  $length = $_POST['length'];
  $weight = $_POST['weight'];
if(empty($sku)){
  $sku_error = "Please enter the sku! ";
}

if(empty($name)){
  $name_error = "Please enter the name! ";
}

if(empty($price)){
  $price_error = "Please enter the price! ";
}

if(empty($size)){
  $size_error = "Please enter the size! ";
}

if(empty($height)){
  $height_error = "Please enter the height! ";
}

if(empty($width)){
  $width_error = "Please enter the width! ";
}

if(empty($length)){
  $length_error = "Please enter the length! ";
}

if(empty($weight)){
  $weight_error = "Please enter the weight! ";
}
  

  $select_product_name = mysqli_query($connect, "SELECT name FROM `product` WHERE name = '$name'") or die('query failed');

  if(mysqli_num_rows($select_product_name) > 0){
     $message[] = 'product name already added';
  }else{
     $add_product_query = mysqli_query($connect, "INSERT INTO `product`(sku, name, price,size, height,width,length, weight) VALUES('$sku', '$name', '$price','$size','$height','$width','$length','$weight')") or die('query failed');
     header('Location:index.php');
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
    <style>
      div.fieldbox {
  display: none;
}
    </style>
</head>
<body>
    <h1 class="add-product-text">Add Product</h1>
    <div class="btn-group">
    <form method="post" action="">
    <input type="submit" class="btn" value="save" name="add_product">
        <button><a href="index.php">Cancel</a></button>
    </div>
    <div class="div"></div>
    <div class="form">
  
    <label for="SKU">SKU</label>
    <input type="text" id="formbox" name="sku" class="input">
    <span><?php if(isset($sku_error)) echo $sku_error; ?></span><br>
    <label for="Name ">Name</label>
    <input type="text" id="formbox" name="name" class="input">
    <span><?php if(isset($name_error)) echo $name_error; ?></span><br>
    <label for="Price">Price($)</label>
    <span><?php if(isset($price_error)) echo $price_error; ?></span><br>
    <input type="number" id="formbox" name="price" class="input"><br>
 
    <label>Choose Type</label>
    <select id="type" name="product" onChange="prodType(this.value);">
      <option value="">Choose Type</option>
      <option value="DVD">DVD</option>
      <option value="Furniture">Furniture</option>
      <option value="Book">Book</option>
    </select>

    <div class="fieldbox" id="dvd" >
      <label>Size (MB)</label>
      <input type="text" name="size" value="" class="input">
      <span><?php if(isset($size_error)) echo $size_error; ?></span><br>
    </div>

    <div class="fieldbox" id="book" >
      <label>Weight (KG)</label>
      <input type="text" name="weight" value="" class="input">
      <span><?php if(isset($weight_error)) echo $weight_error; ?></span><br>
    </div>

    <div class="fieldbox" id="furniture">
      <label>Length</label>
      <input type="text" name="length" class="input"><br>
      <span><?php if(isset($length_error)) echo $length_error; ?></span><br>
  
      <label>Width</label>
      <input type="text" name="width" class="input"><br>
      <span><?php if(isset($width_error)) echo $width_error; ?></span><br>

      <label>Height</label>
      <input type="text" name="height" class="input"><br>
      <span><?php if(isset($height_error)) echo $height_error; ?></span><br>
   
    </div>
    
  </form>
</div>

<script>
  const map = {
  "DVD": "dvd",
  "Furniture": "furniture",
  Book: "book"
};

function prodType(value) {
  document
    .querySelectorAll(".fieldbox")
    .forEach((node) => (node.style.display = "none"));

  document.getElementById(map[value]).style.display = "block";
}

</script>
</body>
</html>
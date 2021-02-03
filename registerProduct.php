<?php  
  require 'func/dbConn.php';
  //fetch tbl product
  $sql_query_product=$conn->query("SELECT * FROM product ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Product</title>
  <link rel="stylesheet" href="ui/style.css">
</head>
<body>
  <form action="#" method="post">
    <div class="form-input">
      <input type="text" placeholder="Brand" name="brand">
    </div>
    <div class="form-input">
      <input type="text" placeholder="Product Name" name="product_name">
    </div>
    <div class="form-input">
      <input type="text" placeholder="Product Price" name="product_price">
    </div>
    <div class="form-input">
      <input type="text" placeholder="RAM" name="ram">
    </div>
    <div class="form-input">
      <input type="text" placeholder="HDD" name="hdd">
    </div>
    <div class="form-input">
      <input type="text" placeholder="Processor" name="processor">
    </div>
    <div class="form-input">
      <input type="text" placeholder="Screen Size" name="screen_size">
    </div>
    <div class="form-input">
      <input type="text" placeholder="OS" name="os">
    </div>
    <div class="form-input">
      <input type="file" name="product_image">
    </div>    
    <div class="form-input">
      <button type="submit" name="register_product">Register </button>
    </div>
  </form>
  <?php
    if(isset($_POST['register_product'])){
      $brand = htmlspecialchars($_POST['brand']);
      $product_name = htmlspecialchars($_POST['product_name']);
      $product_price = htmlspecialchars($_POST['product_price']);
      $ram = htmlspecialchars($_POST['ram']);
      $hdd = htmlspecialchars($_POST['hdd']);
      $processor = htmlspecialchars($_POST['processor']);
      $screen_size = htmlspecialchars($_POST['screen_size']);
      $os = htmlspecialchars($_POST['os']);
      $product_image = htmlspecialchars($_POST['product_image']);

      if($brand == "" || $product_name == "" || $product_price == "" 
        || $ram ==  "" || $hdd = "" || $processor == "" || $screen_size == ""
        || $os == "" || $product_image == ""){
          echo "
            <script>
              alert('Please fill all the required fields');
              href.location='registerProduct.php';
            </script>
          ";
        }else{
          $sql_register = $conn->query("INSERT INTO product (brand, product_name, product_price, ram, hdd, processor, screen_size, os, product_image) VALUES ('$brand', '$product_name', '$product_price', '$ram', '$hdd', '$processor', '$screen_size', '$os', '$product_image')");
          if($sql_register){
            echo "
              <script>
                alert('Registered Successfully');
                href.location='registerProduct.php';
              </script>
            ";
          }else{
            echo "
              <script>
                alert('Registration Failed');
                href.location='registerProduct.php';
              </script>
            ";
          }
        }
    }
  ?>

  <!-- table of content -->
  <table>
    <thead>
      <tr>
        <th>brand</th>
        <th>name</th>
        <th>price</th>
        <th>ram</th>
        <th>hdd</th>
        <th>processor</th>
        <th>screen size</th>
        <th>os</th>
        <th>image</th>
      </tr>
    </thead>
    <tbody>
      <?php
        while($sql_fetch_product=mysqli_fetch_assoc($sql_query_product)){
      ?>
      <tr>
        <td><?=$sql_fetch_product['brand'];?></td>
        <td><?=$sql_fetch_product['product_name'];?></td>
        <td><?=$sql_fetch_product['product_price'];?></td>
        <td><?=$sql_fetch_product['ram'];?></td>
        <td><?=$sql_fetch_product['hdd'];?></td>
        <td><?=$sql_fetch_product['processor'];?></td>
        <td><?=$sql_fetch_product['screen_size'];?></td>
        <td><?=$sql_fetch_product['os'];?></td>
        <td><img src="images/<?=$sql_fetch_product['product_image'];?>" alt="image"></td>
      <?php } ?>
      </tr>
    </tbody>
  </table>
</body>
</html>



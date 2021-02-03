<?php
  require 'func/dbConn.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Filtering Using Botstrap, PHP, MySQLi & Ajax</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="nav-bar">
    <ul class="nav">
      <li class="nav-list"><a href="registerProduct.php" class="nav-link">Register</a></li>
    </ul>
  </nav>

  <h3 class="text-center text-light bg-info p-3">Filtering Using Bootstrap, PHP, Mysqli & Ajax</h3>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-3">
        <h5>Filter Product</h5>
        <hr>
        <h6 class="text-info">Select Brand</h6>
        <ul class="list-group">
          <?php
            $sql_query_brand =  $conn->query("SELECT DISTINCT brand FROM product ORDER BY brand");
            while($sql_fetch_brand = mysqli_fetch_assoc($sql_query_brand)){
          ?>
          <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check" value="<?=$sql_fetch_brand['brand'];?>" id="brand"> <?=$sql_fetch_brand['brand'];?>
              </label>
            </div>
          </li>
          <?php } ?>
        </ul>
        
        <h6 class="text-info">Select Name</h6>
        <ul class="list-group">
          <?php
            $sql_query_name =  $conn->query("SELECT DISTINCT product_name FROM product ORDER BY product_name");
            while($sql_fetch_name = mysqli_fetch_assoc($sql_query_name)){
          ?>
          <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check" value="<?=$sql_fetch_name['product_name'];?>" id="name"> <?=$sql_fetch_name['product_name'];?>
              </label>
            </div>
          </li>
          <?php } ?>
        </ul>
        
        <h6 class="text-info">Select Price</h6>
        <ul class="list-group">
          <?php
            $sql_query_price =  $conn->query("SELECT DISTINCT product_price FROM product ORDER BY product_price");
            while($sql_fetch_price = mysqli_fetch_assoc($sql_query_price)){
          ?>
          <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check" value="<?=$sql_fetch_price['product_price'];?>" id="price"> <?=$sql_fetch_price['product_price'];?>
              </label>
            </div>
          </li>
          <?php } ?>
        </ul>
        
        <h6 class="text-info">Select RAM</h6>
        <ul class="list-group">
          <?php
            $sql_query_ram =  $conn->query("SELECT DISTINCT ram FROM product ORDER BY ram");
            while($sql_fetch_ram = mysqli_fetch_assoc($sql_query_ram)){
          ?>
          <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check" value="<?=$sql_fetch_ram['ram'];?>" id="ram"> <?=$sql_fetch_ram['ram'];?>
              </label>
            </div>
          </li>
          <?php } ?>
        </ul>
        
        <h6 class="text-info">Select HDD</h6>
        <ul class="list-group">
          <?php
            $sql_query_hdd =  $conn->query("SELECT DISTINCT hdd FROM product ORDER BY hdd");
            while($sql_fetch_hdd = mysqli_fetch_assoc($sql_query_hdd)){
          ?>
          <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check" value="<?=$sql_fetch_hdd['hdd'];?>" id="hdd"> <?=$sql_fetch_hdd['hdd'];?>
              </label>
            </div>
          </li>
          <?php } ?>
        </ul>

        <h6 class="text-info">Select Processor</h6>
        <ul class="list-group">
          <?php
            $sql_query_processor =  $conn->query("SELECT DISTINCT processor FROM product ORDER BY processor");
            while($sql_fetch_processor = mysqli_fetch_assoc($sql_query_processor)){
          ?>
          <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check" value="<?=$sql_fetch_processor['processor'];?>" id="processor"> <?=$sql_fetch_processor['processor'];?>
              </label>
            </div>
          </li>
          <?php } ?>
        </ul>

        <h6 class="text-info">Select Screen Size</h6>
        <ul class="list-group">
          <?php
            $sql_query_screen =  $conn->query("SELECT DISTINCT screen_size FROM product ORDER BY screen_size");
            while($sql_fetch_screen = mysqli_fetch_assoc($sql_query_screen)){
          ?>
          <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check" value="<?=$sql_fetch_screen['screen_size'];?>" id="processor"> <?=$sql_fetch_screen['screen_size'];?>
              </label>
            </div>
          </li>
          <?php } ?>
        </ul>

        <h6 class="text-info">Select Operating System</h6>
        <ul class="list-group">
          <?php
            $sql_query_os =  $conn->query("SELECT DISTINCT os FROM product ORDER BY os");
            while($sql_fetch_os = mysqli_fetch_assoc($sql_query_os)){
          ?>
          <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check" value="<?=$sql_fetch_os['os'];?>" id="processor"> <?=$sql_fetch_os['os'];?>
              </label>
            </div>
          </li>
          <?php } ?>
        </ul>

      </div>
      <div class="col-lg-9 col-md-9 col-sm-9">
        <h5 class="text-center" id="textChange">All Products</h5>
        <hr>
        <div class="text-center">
          <img src="images/loader.gif" alt="loader" id="loader" width="200" style="display: none;">
        </div>
        <div class="row" id="result">
          <?php
            $sql_products = $conn->query("SELECT * FROM product");
            while($fetch_products=mysqli_fetch_assoc($sql_products)){
          ?>
          <div class="col-md-3 col-sm-6 mb-5" >
						<div class="card-deck">
							<div class="card border-secondary">
								<img src="images/<?=$fetch_products['product_image'];?>" alt="" class="card-img-top">
								<div class="card-img-overlay">
									<h6 style="margin-top:5px;" class="text-light bg-info text-center rounded p-3"><?=$fetch_products['product_name'];?></h6>
								</div>
								<div class="card-body">
									<h4 class="card-title text-danger">
									Price : <?= number_format($fetch_products['product_price'])?> /=
									</h4>
									<p>
										RAM : <?= $fetch_products['ram']; ?> <br>
										HDD : <?= $fetch_products['hdd']; ?> <br>
										Processor : <?= $fetch_products['processor']; ?> <br>
										Screen Size : <?= $fetch_products['screen_size']; ?> <br>
										OS : <?= $fetch_products['os']; ?> <br>
									</p>
									<a href="#" class="btn btn-success btn-block">Add to Cart</a>
								</div>
							</div>
						</div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
	<script type="text/javascript">
		$(document).ready(function(){

			$(".product_check").click(function(){
				$("#loader").show();

				var action = 'data';
				var brand = get_filter_text('brand');
				var ram = get_filter_text('ram');
				var hdd = get_filter_text('hdd');
				var processor = get_filter_text('processor');
				var screen = get_filter_text('screen_size');
				var os = get_filter_text('os');

				$.ajax({
					url:'action.php',
					method:'POST',
					data:{action:action, brand:brand, ram:ram, hdd:hdd, processor:processor, screen:screen, os:os},

					success:function(response){
						$("#result").html(response);
						$("#loader").hide();
						$("#textChange").text("Filtered Products");
					}
				});
			});


			function get_filter_text(text_id){
				var filterData = [];
				$('#'+text_id+':checked').each(function(){
					filterData.push($(this).val());
				});
				return filterData;
			}
		});
	</script>
</body>
</html>
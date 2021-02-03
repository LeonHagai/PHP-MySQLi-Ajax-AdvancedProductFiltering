<?php
  require 'func/dbConn.php';

  if(isset($_POST['action'])){
    $sql = "SELECT * FROM product WHERE brand != ''";

    if(isset($_POST['brand'])){
      $brand = implode("','", $_POST['brand']);
      $sql .= "AND brand IN ('.$brand.')";
    }
    if(isset($_POST['ram'])){
      $ram = implode("','", $_POST['ram']);
      $sql .= "AND ram IN ('.$ram.')";
    }
    if(isset($_POST['hdd'])){
      $hdd = implode("','", $_POST['hdd']);
      $sql .= "AND hdd IN ('.$hdd.')";
    }
    if(isset($_POST['processor'])){
      $processor = implode("','", $_POST['processor']);
      $sql .= "AND processor IN ('.$processor.')";
    }
    if(isset($_POST['screen'])){
      $screen = implode("','", $_POST['screen']);
      $sql .= "AND screen_size IN ('.$screen.')";
    }
    if(isset($_POST['os'])){
      $os = implode("','", $_POST['os']);
      $sql .= "AND os IN ('.$os.')";
    }

    $result = $conn->query($sql);
    $output = '';

    if($result->num_rows>0){
      while($fetch_products = $result->fetch_assoc()){
        $output .= '<div class="col-md-3 col-sm-6 mb-5" >
						<div class="card-deck">
							<div class="card border-secondary">
								<img src="images/'.$fetch_products['product_image'].'" alt="" class="card-img-top">
								<div class="card-img-overlay">
									<h6 style="margin-top:5px;" class="text-light bg-info text-center rounded p-3">'.$fetch_products['product_name'].'</h6>
								</div>
								<div class="card-body">
									<h4 class="card-title text-danger">
									Price : '. number_format($fetch_products['product_price']).' /=
									</h4>
									<p>
										RAM : '. $fetch_products['ram'].' <br>
										HDD : '. $fetch_products['hdd'].' <br>
										Processor : '. $fetch_products['processor'].' <br>
										Screen Size : '. $fetch_products['screen_size'].' <br>
										OS : '. $fetch_products['os'].' <br>
									</p>
									<a href="#" class="btn btn-success btn-block">Add to Cart</a>
								</div>
							</div>
						</div>
          </div>
        ';
      }
    }else{
      $output = "<h3>No Products Found!</h3>";
    }
    echo $output;     
  }
?>
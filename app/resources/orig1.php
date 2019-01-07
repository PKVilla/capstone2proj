<div class='container mt-5 mb-5'>
			       				<div class='col-lg-12'>
			       				<div class='row'>
			       				<div class='col-lg-12'>
			                	<div class='card h-100'>
			                  <div class='card-body'>
			                	<div class='col-lg-4'>
			                  <img class='img-fluid' src='$row[img_path]'>
			                  </div>
			                  <div class='col-lg-4'>
			                  <h4 class='font-weight-bold'><a href='product.php?name=$row[name]'>$row[name]</a></h4>
			                  <h5>$row[price]</h5>
			                  <p>
			                  $row[description]</p>
			                  <input class='form-control w-100' type='number' min='1' value='1' id='quantity$row[id]'>
			                  <button class='btn w-100 btn-secondary mt-2 font-weight-bold' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-arrow-down'></i> Add to cart</button>
			                  </div>
			               	</div>
			                 </div>
			                  </div>
			                </div>
			            </div>
			            </div>
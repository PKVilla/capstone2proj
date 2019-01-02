<?php session_start(); ?>
<!-- ke a new file called catalog2.php -->
<?php include "../partials/header.php";?>
<!-- page content -->
	

	<div class="container mt-2">
		<div class="row">
			<div class="col-lg-3">
					<div class="input-group mt-2">
					  <input id="search" type="text" class="form-control" placeholder="Search" aria-label="Recipient's username" aria-describedby="button-addon2">
					  <div class="input-group-append">
					    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
			  		</div>
				</div>
				<!-- <h2>COLLECTION</h2> -->
		
		</div>
		
	</div><!-- end of top container -->
<!-- <div class="container mt-5"> -->
	<div class="row">
		<div class="col-lg-3">
			<!-- <h1 id="category">Categories</h1> -->
			<!-- <div class="col-lg-3 text-center">
				<h1>Categories</h1>
 -->
			 <div class="dropdown mt-3">
			  <a id="category" class="btn btn-success dropdown-toggle w-100" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Categories
			  </a>

			  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">


			  	<?php require_once '../controllers/connect.php';
						      	$sql = "SELECT * FROM categories";
						      	$result = mysqli_query($conn, $sql);	

						      	if(mysqli_num_rows($result)>0){
						      		while ($row = mysqli_fetch_assoc($result)){
						      			?>
						            <a href="#" id="categoryid" class = "dropdown-item animated fadeInDown" onclick="showCategories('<?=$row['id'];?>', '<?=$row['name'];?>')"> <?=$row['name'];?></a>	
						            <?php		                   
						      		}
						      	}
						      ?>
			    
			  </div>
			</div>

					<div class="mt-3">
						<!-- <label>PRICE</label> -->
						<select  class="custom-select" id="price">
						  <option selected>Price</option>
						  <option value="1">Low to high</option>
						  <option value="2">High to low</option>
						</select>
					</div>
			</div>
		<div class="col-lg-9">
			<div id="carouselExampleindicators" class="carousel slide my-4" data-ride="carousel">
				<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="carousel-item active">
							<img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
						</div>
					<div class="carousel-item">	
						<img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
					</div>
					</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
				</div>

				 <div class="row" id="products">
		       <?php require "../controllers/connect.php";
			       	$sql = "SELECT * FROM items";
			       	$result = mysqli_query($conn,$sql);
			       	if (mysqli_num_rows($result)>0) {
			       		while ($row = mysqli_fetch_assoc($result)) {
			       		/*	$name = $row["name"];
			       			echo $name. "<br>";*/
			            echo "<div class='col-md-4 mb-5 mt-2'>
			                	<div class='card h-100'>
			                  <img src='$row[img_path]'>
			                  <div class='card-body'>
			                  <h4 class='card-title font-weight-bold'><a href='product.php?name=$row[name]'>$row[name]</a></h4>
			                  <h5>$row[price]</h5>
			                  <p class='card-text'>
			                  $row[description]</p>
			                  </div>
			                  <div class='card-footer'>
			                  <input class='form-control w-100' type='number' min='1' value='1' id='quantity$row[id]'>
			                  <button class='btn w-100 btn-secondary mt-2 font-weight-bold' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-arrow-down'></i> Add to cart</button>
			                  </div>
			                </div>
			            </div>";
			       		}
			       	}
		    	?>
      </div>
      <!-- /.row -->

			</div>
		</div>

	</div><!-- end of row -->

<!-- </div>end of container -->
<!-- footer -->
<?php include "../partials/footer.php";?>
<script type="text/javascript">
	function showCategories(categoryID,cName){
		// alert(categoryID);
		// let cName = $(this).attr("data-id");
		// $('#category').html('cName');
		
		$('#category').html(cName);
		$.ajax({
				url:"../controllers/show_items.php",
				method:"POST",
				data:{
					categoryID:categoryID
				},
				dataType:"text",
				success: function(data){
					$("#products").html(data);
				}
			});
		}
	
	// $(document).ready(()=>{
	// 	$('#categoryid').click(()=>{
			
	// 		let categoryid = $('#category');
	// 	});
	// });

	$("#search").keyup(function(){
  		let word = $(this).val();
  		// console.log(word);
  		$.post("../controllers/show_items2.php", {word:word}, function(data){
  			$("#products").html(data);
  		});

  	});


  	$("#price").change(function(){
  		let sort = $(this).val();
  		// console.log(sort);
  		$.post("../controllers/pick_price.php", {sort:sort}, function(data){
  			$("#products").html(data);
  		});

  	});

  	$("button#addToCart").on("click", function(){
    //get product id
    let productId = $(this).attr("data-id");
    // let quantity = $(this).attr("quantity");
    let quantity = $("#quantity" + productId).val();

    //let quantity = $(this).prev().val();
    console.log("Product Id :" + productId);
    console.log("quantity :" + quantity);

    $.ajax({
        url:"../controllers/addtocart.php",
        method:"POST",
        data:{
          productId: productId,
          quantity: quantity
        },
        datatype:"text",
        success:function(data){
          $('a[href="cart.php"]').html(data);
        }
      });

  });
</script>

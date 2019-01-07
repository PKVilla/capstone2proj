<?php session_start(); ?>

<?php include "../partials/header.php";?>

	
				<?php require "../controllers/connect.php";
					$product = $_GET['name'];
			       	$sql = "SELECT * FROM items WHERE name = '$product'";
			       	$result = mysqli_query($conn,$sql);
			       	if (mysqli_num_rows($result)>0) {
			       		while ($row = mysqli_fetch_assoc($result)) {
			       		echo " <div id='container1'>
								<div class='row' id='home'>
									<div class='col-lg-1'></div>
									<div class='col-lg-10 col-md-6 col-sm-6'>
										<div class='jumbotron jumbotron-fluid jumbo1'>

						  					<img class='me img-fluid' src='$row[img_path]'>

						  					<div class='col-lg-1'></div>
						  					<div class='col-lg-6'>
						    				<h1 class='display clear'><a href='product.php?name=$row[name]'>$row[name]</a></h1>
						    				<h2 class='display clear'>$row[price]</h2>			
						    				<p class='display clear'>$row[description]</p>
						    				</div>
						    				<input class='form-control w-100' type='number' min='1' value='1' id='quantity$row[id]'>
			                  <button class='btn w-100 btn-secondary mt-2 font-weight-bold' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-arrow-down'></i> Add to cart</button>
										</div>
									</div>
								</div>
							</div>";
			       		}
			       	}
		    	?>
		
<?php include "../partials/footer.php";?>

<script type="text/javascript">
	
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

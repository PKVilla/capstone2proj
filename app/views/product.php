<?php session_start(); ?>

<?php include "../partials/header.php";?>

	
				<?php require "../controllers/connect.php";
					$product = $_GET['name'];
			       	$sql = "SELECT * FROM items WHERE name = '$product'";
			       	$result = mysqli_query($conn,$sql);
			       	if (mysqli_num_rows($result)>0) {
			       		while ($row = mysqli_fetch_assoc($result)) {
			       		echo "<div class='col-md-4 mb-2 mt-2'>
			                	<div class='card h-100'>
			                  <img src='$row[img_path]'>
			                  <div class='card-body'>
			                  <h4 class='card-title font-weight-bold'>$row[name]</h4>
			                  <h5>$row[price]</h5>
			                  <p class='card-text'>
			                  $row[description]</p>
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

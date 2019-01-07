<?php
	
	include 'connect.php';

	$categoryID = $_POST['categoryID'];
	$data = "";

	$sql = "SELECT * FROM items where category_id = '$categoryID'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result)>0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$data.="<div class='col-md-4 mb-2 mt-2'>
			                	<div class='card h-100'>
			                  <img class='img-fluid' src='$row[img_path]'>
			                  <div class='card-body'>
			                  <h4 class='card-title font-weight-bold'><a href='product.php?name=$row[name]'>$row[name]</a></h4>
			                  <h5>$row[price]</h5>
			                  <p class='card-text'>
			                  $row[description]</p>
			                  </div>
			                  <div class='card-footer'>
			                  <input class='form-control w-100' type='number' mb-3' min='1' value='1' id='quantity$row[id]'>
			                  <button class='btn w-100 btn-primary mt-2 font-weight-bold' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-arrow-down'></i> Add to cart</button>
			                  </div>
			                </div>
			            </div>";
		}
	}
	echo $data;


?>
<script type="text/javascript">
	
// 	$("button#addToCart").on("click", function(){
//     //get product id
//     let productId = $(this).attr("data-id");
//     // let quantity = $(this).attr("quantity");
//     let quantity = $("#quantity" + productId).val();

//     //let quantity = $(this).prev().val();
//     console.log("Product Id :" + productId);
//     console.log("quantity :" + quantity);
// });


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
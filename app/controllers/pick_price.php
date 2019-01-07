<?php include "../partials/header.php";?>

<?php

include 'connect.php';

	$price = $_POST['sort'];
	$data ="";

	if ($price == 1) {
		$sql = "SELECT * FROM items order by price asc";
	
	}
	else if ($price == 2) {
		$sql = "SELECT * FROM items order by price desc";
	}

	else{
		$sql = "SELECT * FROM items";
	}

	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
	while($row = mysqli_fetch_assoc($result)){
		$data.="<<div class='col-md-4 mb-5 mt-2'>
			                	<div class='card product h-100'>
			                  <img class='img-fluid w-100 h-100' src='$row[img_path]'>
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
else{
	$data = "no records found!";
}

echo $data;

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
      })
});


</script>

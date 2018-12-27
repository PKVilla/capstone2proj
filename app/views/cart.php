<?php session_start(); ?>

<?php include "../partials/header.php";?>
<?php
require "../controllers/connect.php";?>

<div id="loadcart">
  
</div>




<?php include "../partials/footer.php";?>

<script type="text/javascript">
	function loadcart(){
	$.get("../controllers/loadcart.php", function(data){
		$("#loadcart").html(data);
	});
}

$(document).ready(function(){
	loadcart();
});

/*change the no. of items and display the new total*/
function changeNoItems(id){
	let items = $("#quantity" + id).val();
	// console.log(items);
	let price = $("#price" + id).text();
	let newPrice = items * price;
	$("#subTotal" + id).html(newPrice);
	
	/*let grandTotal = $("#subtotal" + newPrice);
	$("$grandTotal" + id).html(grandTotal)*/
	/*$("#grand_total" + id).html(newPrice);*/
	// console.log("subtotal is:" + newPrice);
	let a = [];
	$(".sub-total").each(function(id) {
		a[id] = parseInt($(this).text());
		// console.log(a);
	});
	let sum = 0;
	$.each(a, function(index, value){
		sum += value;
	});
	// console.log(sum);
	$("#grandTotal").html(sum);

	$.ajax({
        url:"../controllers/addtocart.php",
        method:"POST",
        data:{
          productId: id,
          quantity: items
        },
        datatype:"text",
        success:function(data){
          $('a[href="cart.php"]').html(data);
        }
      });
}

function removeFromCart(id){
	var ans = confirm('are you sure?');
	if (ans) {

		$.ajax({
			url:"../controllers/removeFromCart.php",
			method: "POST",
			data:{productId:id},
			dataType:"text",
			success:function(data){
				$('a[href="cart.php"]').html(data);
				loadcart();
			}
		});
	}
}
</script>
<?php session_start(); ?>
<?php include "../partials/header.php";?>


<div class="container mt-5">
	<div class="col-lg-1"></div>
	<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-header">Transaction History</div>
			<div class="card-body">
			<?php
			 require_once '../controllers/connect.php';
			$id = $_SESSION['userid'];
			/*$sql="SELECT tbl_orders.id, tbl_orders.user_id, tbl_orders.purchase_date, tbl_order_items.order_id, tbl_orders_items.item_id, tbl_orders_items.quantity, tbl_orders_items.price from tbl_orders, tbl_orders_items where tbl_orders.id = tbl_orders_items.order_id";*/
			// $sql = "SELECT * FROM tbl_orders where users_id = $id";
			$sql = "SELECT * FROM tbl_order_items left JOIN tbl_orders
				ON tbl_orders.id = tbl_order_items.orders_id where tbl_orders.users_id = '$id' order by tbl_orders.id";

		             $result = mysqli_query($conn, $sql);
		               if(mysqli_num_rows($result) > 0){
		                   while($row = mysqli_fetch_assoc($result)){
		       				// $id = $row['id'];
		       				// $user = $row['users_id'];
		       				// $date = $row['purchase-date'];
		       				// $items = $row['order_id'];
		       				// $item = $row['item_id'];
		       				// $quantity = $row['quantity'];
		       				// $price = $row['price'];
		       				$transaction_code = $row['transaction_code'];
		       				$items_id = $row['items_id'];

		       				// $sql = 
							echo $items_id. ' - ';
							echo $transaction_code. '<br>';
		                   }

		                   
		         		
		         		

		          }		           
			?>
		</div>
	</div>
</div>
</div>
</div>



<?php include "../partials/footer.php";?>

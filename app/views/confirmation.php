<?php require_once '../controllers/connect.php';?>
<?php session_start();?>
<?php unset($_SESSION['cart'], $_SESSION['item_count']);?>
<?php include "../partials/header.php";?>


<?php 
	// this is for the paypal payment id
	// $id = $_SESSION['userid'];

	// $sql = 'INSERT INTO tbl_orders(paypal_trac_code) SELECT id=$id FROM tbl_orders '
	//$sql = "SELECT * from tbl_orders where id = $id";
	// $result = mysqli_query($conn, $sql);
	
	// $paymentMode = $_SESSION['payment_mode'];

	// if ($paymentMode == 2) {
		
	// $paymentId = $_GET['paymentId'];
	// $sql = "INSERT INTO tbl_orders (paypal_trac_code) Values ('$paymentId') SELECT * FROM tbl_orders WHERE id = $id";
	// $result = mysqli_query($conn,$sql);

// }
?>

<div class="container mt-5">
	<div class="row">
	<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header text-center">CONFIRMATION</div>		
				<div class="card-body">
				<h3 class="text-center">Transaction code: </h3>
					<h1 class="text-center">
					<?php echo $_SESSION['transaction_code']; ?>
					</h1>
					<h4 class="text-center">Thank You for Shopping!!!</h4>

					<a class="btn btn-primary shop_again" href="catalog2.php">Shop again!!!</a>
					<a href="transaction.php" class="btn btn-primary transaction">Check Transaction History..</a>
				</div>	
			</div>
		</div>
	</div>
</div>



<?php include "../partials/footer.php";?>
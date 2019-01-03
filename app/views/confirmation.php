<?php require_once '../controllers/connect.php';?>
<?php session_start();?>
<?php unset($_SESSION['cart'], $_SESSION['item_count']);?>
<?php include "../partials/header.php";?>
<div class="container mt-5">
	<div class="row">
	<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<div class="card">
				<div class="card-header text-center">CONFIRMATION</div>		
				<div class="card-body">
				<h3 class="text-center">Here's Transaction code: </h3>
					<h1 class="text-center">
					<?php echo $_SESSION['transaction_code'];?>
					</h1>
					<h4 class="text-center">Thank You for Shopping!!!</h4>

					<a class="btn btn-primary" href="catalog2.php">Shop again!!!</a>
					<a href="transaction.php" class="btn btn-primary">Check Transaction History..</a>
				</div>	
			</div>
		</div>
	</div>
</div>



<?php include "../partials/footer.php";?>
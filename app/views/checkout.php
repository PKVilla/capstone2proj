<?php session_start(); ?>
<?php
//this page is not accessible the user is not logged in
if(!isset($_SESSION["email"])){
  header("location:login.php");
}

?>
<?php include "../partials/header.php"; ?>
<?php require "../controllers/connect.php";?>



<!-- <h3 class="text-center mt-5 mb-5">Checkout</h3>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 mt-5">
				<label>Shipping Address</label>
				<textarea class="form-control"></textarea>
			</div>
			<div class="col-lg-6 mt-5">
				<label>Payment Method</label>
				<select class="custom-select" id="payment">
				  <option selected>----------</option>
				  <option value="1">COD</option>
				  <option value="2">Paypal</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 mt-5">
				<h5>Order Summary</h5>
				<h6>Total</h6>
				<p id="total"></p>
			</div>
		</div>
		<div class="row">
		<div class="col-lg-4 mt-5">
			<button class="btn btn-primary">Place Order</button>
		</div>
		</div>
	</div> -->
	<!-- <table class="table table-hover">
           <thead>
             <tr>
               <th scope="col">Product</th>
               <th scope="col">Price</th>
               <th scope="col">Quantity</th>
               <th scope="col">Sub-total</th>
             </tr>
           </thead>
           <tbody> -->

          <div class="container mt-5 mb-5">
          	<div class="col-lg-4"></div>
          	<div class="card">
          		<div class="col-lg-12">
          		<div class="card-title text-center mt-3"><strong><h1>Checkout</h1></strong></div>
          			<div class="card-body">
          				<div class="row">
          				<div class="col-lg-4">
          				<form action="../controllers/place_order.php" method="post">
          					<label>Shipping Address</label>
          					<textarea class="form-control" name="shipping_address"><?=$_SESSION['address']?></textarea>
          				</div>
          				<div class="col-lg-3 mt-5"><button class="btn btn-primary w-100 mb-2 pull-right" type="submit">Place order</button></div>
          				<div class="col-lg-4">
          				
          					<label>Payment method</label>
          					<select class="custom-select" id="payment" name="payment_mode">
          					<!-- <option selected>----------</option> -->
          					<?php 
          					$sql_mod = "select * from tbl_payment_mode";
          					$result_mod = mysqli_query($conn, $sql_mod);
          					if(mysqli_num_rows($result_mod)>0)
          					{
          						while($row = mysqli_fetch_assoc($result_mod)){
          							echo "<option required value='$row[id]'>$row[name]</option>";
          						}
          					}
          					?>
							  
							</select>
          				</div>
          				</div>
          				<div class="row">
							<div class="col-lg-4 mt-5">
								<h5>Order Summary</h5>
								<h6>Total</h6>
								<p id="total"></p>
							</div>
						</div>
						<div class="row">
								<?php
									

								$data ='
								         <table class="table table-hover">
								           <thead>
								             <tr>
								               <th scope="col">Product</th>
								               <th scope="col">Price</th>
								               <th scope="col">Quantity</th>
								               <th scope="col">Sub-total</th>
								             </tr>
								           </thead>
								           <tbody>
								  ';



								$grand_total = 0;
								foreach($_SESSION['cart'] as $id=> $quantity) {
								   $sql = "SELECT * FROM items where id = '$id' ";
								             $result = mysqli_query($conn, $sql);
								               if(mysqli_num_rows($result) > 0){
								                   while($row = mysqli_fetch_assoc($result)){
								                     $name = $row["name"];
								                     $description = $row["description"];
								                     $price = $row["price"];

								                       //For computing the sub total and grand total
								                       $subTotal = $quantity * $price;
								                       $grand_total += $subTotal;

								                       $data .=
								                         "<tr>
								                             <td><img src='$row[img_path]' width='25%' height='25%'></td>
								                             <td id='price$id'>$price</td>
								                             <td value = '$quantity' id='quantity$id'  min='1' size='5' >$quantity</td>
								                             <td class='sub-total' id='subTotal$id' onchange=addSubtotal()>$subTotal</td>
								                            
								                         </tr>";
								                   }
								               }
								}
								echo $data;
									?>
								
							
						</div>
					
						</form>
          			</div>
          		</div>
          	</div>
          </div>
<script type="text/javascript">
	
</script>
<?php include "../partials/footer.php"; ?>

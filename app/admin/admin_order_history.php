<?php session_start(); ?>
<?php require_once "../controllers/connect.php"; ?>


	<td><button id="deliver_status" class="btn btn-success" data-id='<?= $row['id'] ?>'>Mark as Delivered</button></td>
    <td><button id="cancel_status" class="btn btn-warning" data-id='<?= $row['id'] ?>'>Cancel Order</button></td>





js------------------
$('button#deliver_status').on("click",function(){
        let orderId = $(this).attr('data-id');

        console.log("orderId: " + orderId);
        $.post('admin_deliver.php', {orderId:orderId}, function(data){
          alert("Status successfully changed to 'Delivered' ");
        	document.location.href = 'admin_orders.php';
        });

    });

    $('button#cancel_status').on("click",function(){
        let orderId = $(this).attr('data-id');

        console.log("orderId: " + orderId);
        $.post('admin_cancel.php', {orderId:orderId}, function(data){
          alert("Status successfully changed to 'Cancelled' ");
        	document.location.href = 'admin_orders.php';
        });
 
    });
deliver-------------

<?php session_start(); ?>
<?php require_once "../controllers/connect.php"; ?>


<?php 
	
	$orderId = $_POST['orderId'];

	$sql = "UPDATE tbl_orders SET status_id = 2 WHERE id = '$orderId' ";

	$result = mysqli_query($con,$sql);

	if ($result) {
		header("Location: ../views/dashboard.php");
	}
	else {
		echo mysqli_error($conn);
	}

?>

<?php session_start(); ?>
<?php require_once "../controllers/connect.php"; ?>


<?php 
	
	$orderId = $_POST['orderId'];

	$sql = "UPDATE tbl_orders SET status_id = 3 WHERE id = '$orderId' ";

	$result = mysqli_query($con,$sql);

	if ($result) {
		header("Location: ../views/dashboard.php");
	}
	else {
		echo mysqli_error($conn);
	}

?>

<script type="text/javascript">$('button#deliver_status').on("click",function(){
        let orderId = $(this).attr('data-id');

        console.log("orderId: " + orderId);
        $.post('admin_deliver.php', {orderId:orderId}, function(data){
          alert("Status successfully changed to 'Delivered' ");
        	document.location.href = 'admin_orders.php';
        });

    });

    $('button#cancel_status').on("click",function(){
        let orderId = $(this).attr('data-id');

        console.log("orderId: " + orderId);
        $.post('admin_cancel.php', {orderId:orderId}, function(data){
          alert("Status successfully changed to 'Cancelled' ");
        	document.location.href = 'admin_orders.php';
        });
 
    });
</script>
<?php session_start(); ?>
<?php include "admin_header.php";?>

<?php if (!isset($_SESSION['admin_email'])) {
	header("location: admin_login.php");
}
?>

<div class="container mt-5">
<div class="card-header text-center">Dashboard</div>
<div class="card-body">
	<div class="col-lg-4">
		<a href="admin_add_item.php"><h2>&bull; Add Items</h2></a>
		<a href="admin_items.php"><h2>&bull; Items</h2></a>
	</div>
</div>
</div>



<?php include "admin_footer.php";?>
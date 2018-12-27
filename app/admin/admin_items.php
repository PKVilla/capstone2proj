<?php session_start(); ?>
<?php include "admin_header.php";?>

<?php
     require_once '../controllers/connect.php';
	$sql = "SELECT * FROM items";

	$result = mysqli_query($conn, $sql);

?>
<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
    	<div class="card">
    		<div class="card-header text-center"><h3>ITEMS</h3></div>
    		<div class="card-body">
    			<table class="table table-bordered">
    				<tr>
    					<th>ID</th>
    					<th>NAME</th>
    					<th>PRICE</th>
                        <th>DESCRIPTION</th>
    					<th colspan="2">Actions</th>
    				</tr>
    				<?php while($row = mysqli_fetch_assoc($result)){ ?>
    				<tr>
    					<td><?= $row['id']?></td>
    					<td><?= $row['name']?></td>
    					<td><?= $row['price']?></td>
                        <td><?= $row['description']?></td>
    					<td>
    						<a href="admin_edit_item.php?id=<?=$row['id']?>">Edit</a>
    					</td>
    					<td>
    						<a onclick="return confirm('delete?')" href="admin_delete_item.php?id=<?=$row['id']?>">Delete</a>
    					</td>
    				</tr>
    				<?php } ?>
    			</table>
    		</div>	
    </div>
    </div>
  </div>
</div>

<?php include "admin_footer.php";?>
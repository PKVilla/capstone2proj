<?php session_start(); ?>
<?php include "admin_header.php";?>


<?php
    require_once '../controllers/connect.php';
    $id = $_GET['id'];
    

    $sql = "SELECT * FROM items WHERE id = $id";

    $result = mysqli_query($conn, $sql);
?>

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
    	<div class="card">
    		<div class="card-header">EDIT ITEMS</div>
    		<div class="card-body">
    			<form action="admin_process_update.php" method="POST">
                    <?php while($row = mysqli_fetch_assoc($result)){?>
                    <input type="hidden" name="id" value="<?=$row['id']?>"></input>
    				<div class="form-group">
    					<label>PRODUCT NAME</label>
    					<input class="form-control" value="<?= $row['name']?>" type="text" name="name"></input>
    				</div>
    				<div class="form-group">
    					<label>PRICE</label>
    					<input class="form-control" value="<?= $row['price']?>" type="text" name="price"></input>
    				</div>
                    <div class="form-group">
                        <label>DECRIPTION</label>
                        <input class="form-control" value="<?= $row['description']?>" type="text" name="description"></input>
                    </div>
                    <div class="form-group">
                        <label>IMAGE</label>
                        <input class="form-control" value="<?= $row['img_path']?>" name="image"></input>
                    </div>
    				<input class="btn btn-success" type="submit" value="submit"></input>
    				<input class="btn btn-warning" type="reset" value="clear"></input>
                    <?php }?>
    			</form>
    		</div>	
    </div>
    </div>
  </div>
</div>

<?php include "admin_footer.php";?>
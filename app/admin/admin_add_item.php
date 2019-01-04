<?php session_start(); ?>
<?php include "admin_header.php";?>

<?php if (!isset($_SESSION['admin_email'])) {
	header("location: admin_login.php");
}
?>
<?php require "../controllers/connect.php"; ?>

	<div class="container mt-5 mb-5">
			 <div class="row">
			 <div class="col-lg-2"></div>
			 	<div class="col-lg-6">
			 	<div class="card">
			 	<div class="card-header">Add items</div>
			 	<div class="card-body">
			 		<form action="admin_process_upload.php" method="POST" enctype="multipart/form-data">
			 			<div class="form-group mb-2 mr-2">
				 			<label class="form-inline">Name:</label>
				 			<input class="form-control" type="text" name="name"></input>
			 			</div>
			 			<div class="form-group mb-2">
				 			<label>Categoty:</label>
				 			<select id="inputState" class="form-control" name="choose">
					        <option selected>Choose...</option>
					        <!-- <option>...</option> -->

					         <?php 
          					$sql_mod = "select * from categories";
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
			 			<div class="form-group mb-2">
				 			<label>Price:</label>
				 			<input class="form-control" type="text" name="price"></input>
			 			</div>
			 			<div class="form-group mb-2">
				 			<label>Description:</label>
				 			<textarea class="form-control" name="description"></textarea>
			 			</div>
			 			 <div class="form-group mb-2">
						    <label>Image</label>
						    <input type="file" class="form-control-file" name="file">
						    <button class="btn btn-success mt-1" name="submit">UPLOAD</button>
						 </div>
						<!--  <div class="form-group">
						 	<input type="submit" class="btn btn-primary" name="submit"></input>
						 </div> -->
			 		</form>
			 	</div>
			 </div>
		</div>
		</div>

 <?php include "admin_footer.php" ;?>

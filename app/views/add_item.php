<?php include "../partials/header.php";?>
	

	<div class="container mt-5">
			 <div class="row">
			 <div class="col-lg-2"></div>
			 	<div class="col-lg-6">
			 	<div class="card">
			 	<div class="card-header">Add items</div>
			 	<div class="card-body">
			 		<form>
			 			<div class="form-group mb-2 mr-2">
				 			<label class="form-inline">Name:</label>
				 			<input class="form-control" type="text" name="name"></input>
			 			</div>
			 			<div class="form-group mb-2">
				 			<label>Categoty:</label>
				 			<select id="inputState" class="form-control">
					        <option selected>Choose...</option>
					        <option>...</option>
					      </select>
			 			</div>
			 			<div class="form-group mb-2">
				 			<label>Price:</label>
				 			<input class="form-control" type="text" name="name"></input>
			 			</div>
			 			<div class="form-group mb-2">
				 			<label>Description:</label>
				 			<textarea class="form-control"></textarea>
			 			</div>
			 			 <div class="form-group mb-2">
						    <label>Image</label>
						    <input type="file" class="form-control-file">
						    <button class="mt-1">Upload</button>
						 </div>
						 <div class="form-group">
						 	<input type="submit" class="btn btn-primary"></input>
						 </div>
			 		</form>
			 	</div>
			 </div>
		</div>
		</div>

 <?php include "../partials/footer.php" ;?>

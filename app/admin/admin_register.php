<?php include "admin_header.php";?>

<div class="container mt-5">
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
    	<div class="card">
    		<div class="card-header">Registration Form</div>
    		<div class="card-body">
    			<form action="admin_process_register.php" method="POST">
    				<div class="form-group">
    					<label>Firstname</label>
    					<input class="form-control" type="text" name="firstname"></input>
    				</div>
    				<div class="form-group">
    					<label>Lastname</label>
    					<input class="form-control" type="text" name="lastname"></input>
    				</div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email"></input>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password"></input>
                    </div>
    				<input class="btn btn-success" type="submit" value="SUBMIT"></input>
    				<input class="btn btn-warning" type="reset" value="CLEAR"></input>
    			</form>
    		</div>	
    </div>
    </div>
  </div>
</div>

<?php include "admin_footer.php";?>
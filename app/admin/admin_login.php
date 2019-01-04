<?php include "admin_header.php";?>

<div class="container mt-5">
  <div class="row">
  	<div class="col-lg-4"></div>
    <div class="col-lg-4">
    	<div class="card">
	    	<div class="card-header text-center">ADMIN LOGIN</div>
	    	<div class="card-body">
	      		<form id="form_login" action="admin_process_login.php" method="POST">
			      	<div class="form-group">
			      		<label>Email</label>
			      		<input id="email" type="email" class="form-control" name="email" placeholder="Email"></input>
			      	</div>
			      	<div class="form-group">
			      		<label>Password</label>
			      		<input id="password" type="password" class="form-control" name="password" placeholder="Password"></input>
			      	</div>
			      	<input id="btn_login" type="submit" value="Log-in" class="w-100 btn btn-outline-primary"></input>
	      		</form>
	      	</div>
      	</div>
    </div>
  </div>
</div>

<?php include "admin_footer.php";?>
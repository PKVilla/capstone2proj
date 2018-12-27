<?php include "../partials/header.php";?>

<div class="container mt-2 mb-5">
  <div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
    	<div class="card">
    		<div class="card-header">Registration Form</div>
    		<div class="card-body">
    			<form action="../controllers/process_register.php" method="POST">
    				<div class="form-group">
    					<label>Last Name</label>
    					<input class="form-control" type="text" name="lastname" data-validation="alphanumeric" ></input>
    				</div>
    				<div class="form-group">
    					<label>First Name</label>
    					<input class="form-control" type="text" name="firstname"></input>
    				</div>
    				<div class="form-group">
    					<label>Email Address</label>
    					<input id="email" class="form-control" type="email" name="email"></input>
    					<!-- <small>Will never share your email address with anyone.</small> -->
                        <p id="results"></p>
    				</div>
    				<div class="from-group">
    					<label>Password</label>
    					<input class="form-control" type="password" name="password"></input>
    				</div>
    				<div class="form-group">
    					<label>Address</label>
    					<textarea class="form-control" type="text" name="address"></textarea>
    				
    				</div>
    				<input id="button" class="btn btn-success w-100 mb-2" type="submit" value="submit"></input>
    				<input class="btn btn-warning w-100" type="reset" value="clear"></input>
    			</form>
    		</div>	
    </div>
    </div>
  </div>
</div>

 <?php include "../partials/footer.php" ;?>
<script type="text/javascript">
    $("#email").keyup(function(){
        let email = $(this).val(); 
        // console.log(email);
        $.post("../controllers/email_validator.php",{email:email},function(data) {
            $("#results").html(data);
        });
    });
  </script>
        
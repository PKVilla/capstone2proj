<?php include "../partials/header.php";?>
<div class="container mt-5">
  <div class="row">
  	<div class="col-lg-4"></div>
    <div class="col-lg-4">
    	<div class="card">
	    	<div class="card-header text-center">USERS LOGIN</div>
	    	<div class="card-body">
	      		<form id="form_login" action="../controllers/process_login.php" method="POST">
			      	<div class="form-group">
			      		<label>Email</label>
			      		<input id="email" type="email" class="form-control" name="email" placeholder="Email"></input>
			      	</div>
			      	<div class="form-group">
			      		<label>Password</label>
			      		<input id="password" type="password" class="form-control" name="password" placeholder="Password"></input>
			      	</div>
			      	<input id="btn_login" type="submit" value="Log-in" class="btn btn-outline-primary"></input>
	      		</form>
	      	</div>
      	</div>
    </div>
  </div>
</div>
<?php include "../partials/footer.php";?>
// <script type="text/javascript">
	/*$(document).ready(() =>{

	$("#btn_login").click(()=>{
		let username = $("#email").val();
		let password = $("#password").val();

		let error_flag = 0;
		if (username == "") {
			$("#email").next().css("color", "red");
			$("#username").next().html("Username is required!");
			error_flag = 1;
		}
		else{
			$("#email").next().html("");
		}
		if (password == "") {
			$("#password").next().css("color", "red");
			$("#password").next().html("password is required!");
			error_flag = 1;
		}
		else{
			$("#password").next().html("");
		}
		if (error_flag == 0) {

			$.ajax({
				"url": "..//controllers/process_login.php",
				"data": {"email" : email,
						"password": password },
				"type": "POST",
				"success": (dataFromPHP) =>{
					if (dataFromPHP == "success") {*/
						/*$("#error_message").css("color","green");
						$("#error_message").html(dataFromPHP);*/
						/*$("#form_login").submit();
					}
					else{
						$("#error_message").css("color", "red");
						$("#error_message").html(dataFromPHP);
					}
				}
			});
		}
	});

});*/
</script>
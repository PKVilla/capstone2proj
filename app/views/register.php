<?php include "../partials/header.php";?>
<div class="container mt-2 mb-5">
  <div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
    	<div class="card">
    		<div class="card-header">Registration Form</div>
    		<div class="card-body">
    			<form name="regform" action="" method="POST">
    				<div class="form-group">
    					<label>Last Name</label>
    					<input id="lastname" class="form-control" type="text" name="lastname" data-validation="alphanumeric" ></input>
                        <p id="lname"></p>
    				</div>
    				<div class="form-group">
    					<label>First Name</label>
    					<input id="firstname" class="form-control" type="text" name="firstname"></input>
                        <p id="fname"></p>
    				</div>
    				<div class="form-group">
    					<label>Email Address</label>
    					<input id="email" class="form-control" type="email" name="email"></input>
    					<!-- <small>Will never share your email address with anyone.</small> -->
                        <p id="results"></p>
    				</div>
    				<div class="from-group">
    					<label>Password</label>
    					<input id="password" class="form-control" type="password" name="password"></input>
                        <p id="pword"></p>
    				</div>
    				<div class="form-group">
    					<label>Address</label>
    					<textarea id="address" class="form-control" type="text" name="address"></textarea>
                        <p id="add"></p>
    				
    				</div>
    				<input id="button" class="btn btn-success w-100 mb-2" type="submit" value="submit"></input>
    				<input class="btn btn-warning w-100" type="reset" value="clear""></input>
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

    $("#button").click(function(){
        let lastname = $("#lastname").val();
        let firstname = $("#firstname").val();
        let email1 = $("#email").val();
        let password = $("#password").val();
        let address = $("#address").val();
        let error_log = 0;
        console.log(lastname);
        if(lastname == ""){
            $("#lname").html("Please input");
            error_log = 1;
        }
        if(firstname == ""){
            $("#fname").html("");
            error_log = 1;
        }
        if(email == ""){
            $("#results").html("");
            error_log = 1;
        }
        if(password == ""){
            $("#pword").html("");
            error_log = 1;
        }
        if(address == ""){
            $("#add").html("");
            error_log = 1;
        }

        if(error_log == 0){
         $.post("../controllers/process_register.php",{email1:email1, lastname:lastname, firstname:firstname, password:password, address:address},function(data) {
            $("#results").html(data);
        });
    }

    });

//     function validate() {
//     if (document.regform.lastname.value == 0) {
//         alert("Enter Email");
//     }
 
//     else if (document.regform.firstname.value == 0) {
//         alert("Enter Firstname");
//     }
//     // else if (document.regform.email.value == 0) {
//     //     alert("Enter Email");
//     // }
//     else if (document.regform.password.value == 0) {
//         alert("Enter Password");
//     }
//     else if (document.regform.address.value == 0) {
//         alert("Enter Address");
//     }
//     else {
 
//         alert("Sucessfull Login");
//     }
// }
  </script>

        
<?php session_start(); ?>
<?php require_once "../partials/header.php"; ?>
<?php require_once "connect.php"; ?>


<?php 


  $email= $_POST['email'];
  $password = sha1($_POST['password']);
  $sql = "SELECT * FROM tbl_users where email = '$email'";
  $result = mysqli_query($conn, $sql);

  $count = mysqli_num_rows($result);

    // if ($email == "") {
    // header("location: ../views/login.php");
    // }
    // if ($password == "") {
    //   header("location: ../views/login.php");
    // }


  
  if (mysqli_num_rows($result)>0) {
    while($row = mysqli_fetch_assoc($result)){
      /*echo $row["lastname"];
      echo "<br>";
      echo $row["firstname"];*/
      $_SESSION['userid'] = $row['id'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['lastname'] = $row['lastname'];
      $_SESSION['firstname'] = $row['firstname'];
      $_SESSION['address'] = $row['address'];
    }

    if ($count == 1) {
      echo "success";
       // header("location: ../views/catalog2.php");
    }
    else{
      echo "invalid username/password";
      header("location: ../views/login.php");
    }
   
    
  }


?>
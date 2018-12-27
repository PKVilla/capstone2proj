<?php session_start(); ?>

<?php require_once "admin_header.php"; ?>

<?php
  require_once '../controllers/connect.php';

  $email = $_POST['email'];
 
  $sql = "SELECT * FROM tbl_admin_users WHERE admin_email = '$email'";

  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result)>0) {
    while($row = mysqli_fetch_assoc($result)){
      $_SESSION['email'] = $row['admin_email'];
      $_SESSION['admin_email'] = $email; 
    }
   header("location: admin_dashboard.php");
  }
  else{
   header('location: admin_login.php');
  }

?>
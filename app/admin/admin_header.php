
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <link rel="icon" type="image/svg" href="../assets/images/esr-default.png">
    <!-- Bootstrap core CSS -->
    <link href="https://fonts.googleapis.com/css?family=ZCOOL+KuaiLe" rel="stylesheet">
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="http://bootswatch.com/4/slate/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

  </head>
   <body>

    <!-- Navigation -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mb-5">
      <div class="container">
        <a class="navbar-brand" href="admin_dashboard.php"><img style="height: 50px" src="../assets/images/esr-for-dark-bg.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item">
              <a class="nav-link" href="catalog2.php">CATALOG
                <span class="sr-only">(current)</span>
              </a>
            </li> -->
            
            <?php

            if (isset($_SESSION['admin_email'])) {
              
              echo "<li class='nav-item'>
              <a class='nav-link' href='admin_logout.php'><i class='fas fa-sign-out-alt'></i> LOGOUT</a>
            </li>";

            }else{
              echo "<li class='nav-item'>
              <a class='nav-link' href='admin_process_login.php'><i class='fas fa-sign-out-alt'></i> LOGIN</a>
            </li>";
            }
            ?>
             <?php
            if (!isset($_SESSION['admin_email'])) {
              echo "<li class='nav-item'>
              <a class='nav-link' href='admin_register.php'><i class='fas fa-sign-out-alt'></i> REGISTER</a>
            </li>";
            }
            ?>
          </ul>
        </div>
      </div>
    </nav>


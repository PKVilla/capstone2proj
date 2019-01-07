<?php session_start(); ?>
<?php include "../partials/header.php";?>

    <!-- Page Content -->
      <div class="embed-responsive embed-responsive-16by9 mt-3">
      <iframe width="500" height="200" src="https://www.youtube.com/embed/bg2E2iB22Fo?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>  

       <hr class="mb-5 mt-5" style="color: #85929E; border: 5px; border-radius: 5px; border-style: solid; width: 90%; margin-left: 50px;">

    <div class="container mt-5">
      <!-- <img src="../assets/images/bike.jpg"> -->

      <!-- Jumbotron Header -->
    <!--  <header class="jumbotron my-4">
        <h1 class="display-3">A Warm Welcome!</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
        <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
      </header> -->



      <div class="row mt-5 mb-5">
       <?php require "../controllers/connect.php";
        $sql = "SELECT * FROM items LIMIT 10";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)>0) {
          while ($row = mysqli_fetch_assoc($result)) {
          /*  $name = $row["name"];
            echo $name. "<br>";*/
            echo "<div class='col-md-4 mb-5'>
                        <div class='card product h-100'>
                        <img class='img-fluid' src='$row[img_path]'>
                        <div class='card-body'>
                        <h4 class='card-title font-weight-bold'><a href='product.php?name=$row[name]'>$row[name]</a></h4>
                        <h5>$row[price]</h5>
                        <p class='card-text'>
                        $row[description]</p>
                        </div>
                        <div class='card-footer'>
                        <input class='form-control w-100' type='number' min='1' value='1' id='quantity$row[id]'>
                        <button class='btn w-100 btn-primary mt-2 font-weight-bold' id='addToCart' data-id='$row[id]'><i class='fas fa-cart-arrow-down'></i> Add to cart</button>
                        </div>
                      </div>
                  </div>";
          }
        }
        ?>
        <div class="row justify-content-start fixed-bottom">
          <a href="index.php"><img class="up" src="../assets/images/arrow2.png"></a>
        </div>
<?php include "../partials/footer.php" ;?>
<script>
  $("button#addToCart").on("click", function(){
    //get product id
    let productId = $(this).attr("data-id");
    // let quantity = $(this).attr("quantity");
    let quantity = $("#quantity" + productId).val();

    //let quantity = $(this).prev().val();
    console.log("Product Id :" + productId);
    console.log("quantity :" + quantity);

      $.ajax({
        url:"../controllers/addtocart.php",
        method:"POST",
        data:{
          productId: productId,
          quantity: quantity
        },
        datatype:"text",
        success:function(data){
          $('a[href="cart.php"]').html(data);
        }
      });

  });
</script>

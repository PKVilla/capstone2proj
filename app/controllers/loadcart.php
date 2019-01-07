<?php session_start(); ?>
<?php

  require_once 'connect.php';
  $cart=0;
  if (isset($_SESSION["cart"])) {
    $cart = array_sum($_SESSION["cart"]);
  }
 
  if($cart!=0){
      $quantity = 0;
      $price = 0;
  ?>  



<?php
$data ='<div class="col-lg-2 mt-5"></div>

        <div class="container mb-5">
        <div class="col-lg-8">
        <div class="row">
        <div class="card">
        <div class="card-header text-center">CART</div>
        <div class="card-body">
         <table class="table table-hover">
          
             <tr>
               <th scope="col">Product</th>
               <th scope="col">Price</th>
               <th scope="col">Quantity</th>
               <th scope="col">Sub-total</th>
             </tr>
           
           <tbody>
  ';

//--------------------------------

//-------------------------------

$grand_total = 0;
foreach($_SESSION['cart'] as $id=> $quantity) {
   $sql = "SELECT * FROM items where id = '$id' ";
             $result = mysqli_query($conn, $sql);
               if(mysqli_num_rows($result) > 0){
                   while($row = mysqli_fetch_assoc($result)){
                     $name = $row["name"];
                     $description = $row["description"];
                     $price = $row["price"];

                       //For computing the sub total and grand total
                       $subTotal = $quantity * $price;
                       $grand_total += $subTotal;

                       $data .=
                         "<tr>
                             <td><img id='ma' class='img-fluid' src='$row[img_path]' width='25%' height='25%'></td>
                             <td id='price$id'> $price</td>
                             <td><input type='number' onkeypress='return event.charCode >= 48 && event.charCode <= 57' class ='form-control' value = '$quantity' id='quantity$id'  min='1' size='5' onchange=changeNoItems($id)></td>
                             <td class='sub-total' id='subTotal$id' onchange=addSubtotal()>$subTotal</td>
                             <td><button class='btn btn-danger' onclick='removeFromCart($id)'>Remove</button></td>
                         </tr>";
                   }
               }
               
}

$data .="</tbody></table>
             <hr>
             <h3 align='right'>Total: &#x20B1; <span id='grandTotal'>$grand_total </span><br><a href='checkout.php' class='btn btn-success'>Check Out</a>

             </div>
             </div>
             </div>
             </div>
             </div>";
            
echo $data;
}
else{
  echo "
        <div class='col-lg-12'>
        <div class='container mt-5'>
        <div class='card'>
        <div class='card-header text-center'>
                  <h1>My Cart</h1>
                <div class='card-body text-center'>
                <p>Your Cart is Empty</p>
                <a href='../views/catalog2.php'><button class = 'btn btn-primary my-2><i class='fas fa-undo'></i>Catalog</button></a>
                </div>
                </div>
                </div>
                </div>";         
    }
?>
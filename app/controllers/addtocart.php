
<?php

session_start();

$id = $_POST["productId"];
$quantity = $_POST["quantity"];

//update the items for session cart variable

$_SESSION["cart"][$id] = $quantity;
$_SESSION["item_count"] = array_sum($_SESSION["cart"]);

echo "<span class='glyphicon glyphicon-shopping-cart'></span>CART <span class='badge-pill badge-success'>". $_SESSION['item_count']."</span>";

?> 
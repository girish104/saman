<?php
require './includes/App.php';
$app = new App;

if (isset($_POST['userId'])) {

    $userId = $_POST['userId'];

    $cart_price = $app->selectOne("SELECT SUM(cart_product_price) AS all_price FROM cart WHERE user_id = '$userId'");
    $output = $cart_price->all_price;
    echo $output;
}

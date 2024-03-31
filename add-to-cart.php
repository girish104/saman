<?php
require './includes/App.php';
$app = new App;

if (isset($_POST['productId']) && isset($_POST['userId'])) {
    $productId = $_POST['productId'];
    $userId = $_POST['userId'];

    // Fetch product information from database
    $selectQuery = "SELECT * FROM products WHERE product_id = '{$productId}'";
    $product = $app->selectOne($selectQuery);

    $product_title = $product->product_title;
    $product_price = $product->product_price;
    $product_rating = $product->product_rating;
    $product_description = $product->product_description;
    $product_image = $product->product_image;

    $path = '';
    // Add product to cart
    $insertQuery = "INSERT INTO cart (user_id, cart_product_id, cart_product_title, cart_product_price,cart_product_image, cart_product_description, cart_product_rating) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $app->insert($insertQuery, [
        $userId,
        $productId,
        $product_title,
        $product_price,
        $product_image,
        $product_description,
        $product_rating,
    ], $path);

    echo 'success';
}
?>
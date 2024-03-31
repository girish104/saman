<?php
require './includes/App.php';
$app = new App;

if (isset($_POST['productId']) && isset($_POST['userId'])) {
    $productId = $_POST['productId'];
    $userId = $_POST['userId'];

    $deleteQuery = "DELETE FROM cart WHERE cart_product_id = ? AND user_id = ?";
    $app->delete($deleteQuery, [
        $productId,
        $userId,
    ]);

    echo 'success';
}

<?php require '../includes/App.php'; ?>
<?php $app = new App;
$app->startingSession(); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productIds'])) {
    $userId = $_SESSION['userId'];
    $productIds = $_POST['productIds'];
    $paymentStatus = "success";


    $query = "SELECT * FROM cart WHERE user_id = '$userId'";
    $selectedProducts = $app->selectAll($query);
    $path = '';
    foreach ($selectedProducts as $selectedProduct) {
        $insertIntoOrders = "INSERT INTO orders (user_id, order_product_id, order_product_title, order_product_price, order_product_image, order_product_description) VALUES (?,?,?,?,?,?)";
        $arr = [
            $userId,
            $selectedProduct->cart_product_id,
            $selectedProduct->cart_product_title,
            $selectedProduct->cart_product_price,
            $selectedProduct->cart_product_image,
            $selectedProduct->cart_product_description,
        ];
        $app->insert($insertIntoOrders, $arr, $path);
    }

    foreach ($productIds as $productId) {
        $query = "DELETE FROM cart WHERE cart_product_id = ? AND user_id = ?";
        $success = $app->delete($query, [
            $productId,
            $userId,
        ]);
    }
    echo $paymentStatus;
}
?>
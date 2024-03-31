<?php
require './includes/App.php';
$app = new App;

if (isset($_POST['userId'])) {
    $userId = $_POST['userId'];

    $selectQuery = "SELECT * FROM cart WHERE user_id = '$userId'";
    $results = $app->selectAll($selectQuery);

    if ($results) {
        $arr = [];
        foreach ($results as $result) {
            $arr[] = $result->cart_product_id;
        }
        echo json_encode($arr);
    }
}

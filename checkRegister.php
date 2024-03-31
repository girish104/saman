<?php
require './includes/App.php';
$app = new App;

if (isset($_POST['username'])) {
    $userId = $_POST['username'];

    $check_query = "SELECT * FROM users WHERE user_id = '$userId'";
    $check_query_result = $app->selectAll($check_query);

    if ($check_query_result !== false) {
        echo 'username already exists';
    }
}

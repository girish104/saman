<?php
require '../includes/App.php';
$app = new App;

if (isset($_POST['email'])) {
    $userEmail = $_POST['email'];

    $check_query = "SELECT * FROM users WHERE user_email = '$userEmail'";
    $check_query_result = $app->selectAll($check_query);

    if ($check_query_result !== false) {
        echo 'Email already exists';
    }
}

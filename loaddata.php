<?php

// Function to fetch data from API
// function fetch_data_from_api($url)
// {
//     $ch = curl_init($url);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     $data = curl_exec($ch);
//     curl_close($ch);
//     return $data;
// }

// Database connection parameters
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "saman";

// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
// if ($conn->connect_error) {
    // die("Connection failed: " . $conn->connect_error);
// }

// URL of the Fake Store API
// $url = "https://dummyjson.com/products";

// Fetch data from the API
// $json_data = fetch_data_from_api($url);

// Decode JSON data
// $data = json_decode($json_data, true);

// Extract products array
// $products = $data['products'];

// Insert data into database
// foreach ($products as $product) {

    // $product_title = $conn->real_escape_string($product['title']);
    // $product_price = $product['price'];
    // $product_description = $conn->real_escape_string($product['description']);
    // $product_rating = $product['rating'];
    // Assuming 'thumbnail' is the image URL
    // $product_image = $product['thumbnail'];
    // Randomly select a category
    // $categories = ['man', 'woman', 'kids', 'appliances', 'grocery', 'furniture', 'electronics', 'crafts'];
    // $product_category = $categories[array_rand($categories)]; // Selecting a random category
    // $created_at = date('Y-m-d H:i:s');

    // SQL query to insert data
//     $sql = "INSERT INTO products (product_title, product_description, product_price, product_rating, product_image, created_at, product_category) 
//             VALUES ('$product_title', '$product_description', '$product_price', '$product_rating', '$product_image', '$created_at', '$product_category')";

//     if ($conn->query($sql) === TRUE) {
//         echo "Record inserted successfully<br>";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
// }

// Close database connection
// $conn->close();

<?php
require '../includes/App.php';

?>

<?php
$app = new App;
if (isset($_GET['value'])) {

    $value = $_GET['value'];
    $selectAllProductsQuery = "SELECT * FROM products WHERE product_title LIKE '%$value%'";

    $products = $app->selectAll($selectAllProductsQuery);

    $output = '';
    if (!empty($products)) {
        foreach ($products as $product) {
            $output .= '<tr class="table-row hover-row">';
            $output .= '<td scope="col" class="image-cell">';
            $output .= '<a href="single-product.php?id=' . $product->product_id . '" class="anchor">';
            $output .= '<img src="' . $product->product_image . '" class="product-image" alt="">';
            $output .= '</a>';
            $output .= '</td>';
            $output .= '<td scope="col" class="content">';
            $output .= '<a href="single-product.php?id=' . $product->product_id . '" class="anchor"><div class="table-content">';
            $output .= '<div class="table-title">';
            $output .= '<b>' . $product->product_title . '</b> ';
            $output .= $product->product_description;
            $output .= '</div></a>';
            $output .= '<div class="table-rating">';
            for ($i = 1; $i <= $product->product_rating; $i++) {
                $output .= '<i class="fa-solid fa-star" style="color: #ffbf00"></i>';
            }
            $output .= '</div>';
            $output .= '<div class="table-price">';
            $output .= '<span> $' . $product->product_price . '</span>';
            $output .= '</div>';
            $output .= '<div class="view-all-btn">';
            $output .= '<button class="buy-now-btn" data-product-id="' . $product->product_id . '">ADD TO CART</button>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</td>';
            $output .= '</tr>';
        }
        echo $output;
    } else {
        $output .= '<tr><td colspan="2">No products found in this category.</td></tr>';
        echo $output;
    }
}
?>

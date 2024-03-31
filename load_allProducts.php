<?php
require './includes/App.php';

?>

<?php
$app = new App;
if (isset($_POST['sortValue']) && isset($_POST['categoryValue'])) {
    $sortValue = $_POST['sortValue'];
    $category = $_POST['categoryValue'];

    $orderBy = 'product_id ASC'; // default sort order

    if ($sortValue == 'low') {
        $orderBy = 'product_price ASC';
    } elseif ($sortValue == 'high') {
        $orderBy = 'product_price DESC';
    } elseif ($sortValue == 'new') {
        $orderBy = 'product_id DESC';
    }

    $selectAllProductsQuery = "SELECT * FROM products WHERE product_category = '$category' ORDER BY $orderBy ";
    $products = $app->selectAll($selectAllProductsQuery);

    $output = '';
    if (!empty($products)) {
        foreach ($products as $product) {
            $output .= '<tr class="table-row rounded-lg overflow-hidden">';
            $output .= '<td scope="col" class="p-4 ">';
            $output .= '<a href="single-product.php?id=' . $product->product_id . '" class="block">';
            $output .= '<img src="' . $product->product_image . '" class="w-20 h-20 object-cover rounded-lg" alt="">';
            $output .= '</a>';
            $output .= '</td>';
            $output .= '<td scope="col" class="p-4">';
            $output .= '<a href="single-product.php?id=' . $product->product_id . '" class="text-black hover:text-gray-600">';
            $output .= '<div class="mb-2">';
            $output .= '<h3 class="text-lg font-bold text-gray-800">' . substr(trim($product->product_title), 0, 45) . (strlen($product->product_title) > 45 ? '...' : '') . '</h3> ';
            $output .= '<p class="text-sm text-gray-600">' . substr(trim($product->product_description), 0, 80) . (strlen($product->product_description) > 80 ? '...' : '') . '</p>';

            $output .= '</div>';
            $output .= '</a>';
            $output .= '<div class="flex items-center">';
            for ($i = 1; $i <= $product->product_rating; $i++) {
                $output .= '<i class="fas fa-star text-yellow-400 mr-1"></i>';
            }
            $output .= '</div>';
            $output .= '<div class="mt-2 text-lg font-medium text-red-700">';
            $output .= '<span> $' . $product->product_price . '</span>';
            $output .= '</div>';
            $output .= '<div class="mt-4">';
            $output .= '<button class="bg-[#024547] text-white buy-now-btn px-4 py-2 rounded-md shadow-sm hover:bg-opacity-75 " data-product-id="' . $product->product_id . '">ADD TO CART</button>';
            $output .= '</div>';
            $output .= '</td>';
            $output .= '</tr>';
        }

        echo $output;
    } else {
        $output .= '<tr><td colspan="2" class="text-center text-gray-600">No products found in this category.</td></tr>';
        echo $output;
    }
}
?>

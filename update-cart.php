<?php
require './includes/App.php';
$app = new App;

if (isset($_POST['userId'])) {

    $userId = $_POST['userId'];

    $selectQuery = "SELECT * FROM cart WHERE user_id = '$userId'";
    $cartItems = $app->selectAll($selectQuery);
    $output = '';
    if (is_array($cartItems)) {
        $cartItemsCount = count($cartItems);
        if ($cartItemsCount > 0) {
            foreach ($cartItems as $cart) {
                $output .= "
                    
                            <tr>
                                <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                                    <div class='flex'>
                                        <div class='flex-shrink-0 w-10 h-10'>
                                        <img src='" . $cart->cart_product_image . "' class='w-full h-full rounded-full' alt=''>
                                        </div>
                                        <div class='ml-3'>
                                            <p class='text-gray-900 whitespace-no-wrap'>
                                            " . $cart->cart_product_title . "
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                                    <p class='text-gray-900 whitespace-no-wrap'>$" . $cart->cart_product_price . "</p>
                                </td>
                                <td class='px-5 py-5 border-b border-gray-200 bg-white text-sm'>
                                <button class='delete bg-red-500 hover:bg-red-600 text-white font-medium py-1 px-2 rounded-lg focus:outline-none delete'  data-product-id='" . $cart->cart_product_id . "'>delete
                        </button>
                        </td>
                                
                ";
            }
            echo $output;
        } else {
            echo "<div class='text-center text-gray-500 py-8'>
                    <p class='text-2xl font-semibold'>Your cart is empty</p>
                    <p class='mt-2'>Start shopping now!</p>
                </div>";
        }
    }
}

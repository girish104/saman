<?php require "./includes/header.php"; ?>
<?php require "./includes/config.php"; ?>

<?php
if (isset($_SESSION['userId'])) {
    $userId = $_SESSION['userId'];
    $selectQuery = "SELECT * FROM orders where user_id = '$userId'";
    $orders = $app->selectAll($selectQuery);
}
?>

<?php if (isset($_SESSION['userId'])) : ?>
    <div class="text-center text-gray-700 my-4">
        Welcome, <span class="font-semibold"><?php echo $_SESSION['userId']; ?></span>
    </div>
<?php endif; ?>

<?php
if (!empty($orders)) :
?>


    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            <div>
                <h2 class="text-2xl font-semibold leading-tight">Orders</h2>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Products
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Price
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Order Date
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100"></th>
                            </tr>
                        </thead>
                        <tbody>
                                  <?php foreach ($orders as $order) : ?>
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                <img class="w-full h-full rounded-full" src="<?php echo $order->order_product_image ?>" alt="">
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    <?php echo $order->order_product_title ?>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">₹<?php echo $order->order_product_price ?></p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap"><?php echo $order->order_created_date ?></p>
                                        <p class="text-gray-600 whitespace-no-wrap">Will be delievered in <?php

                                                                                                            $num = rand(2, 7);
                                                                                                            echo $num; ?> days</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                            <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                            <span class="relative"><?php echo $order->order_status ?></span>
                                        </span>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                                        <button type="button" class="inline-block text-gray-500 hover:text-gray-700">
                                            <svg class="inline-block h-6 w-6 fill-current" viewBox="0 0 24 24">
                                                <path d="M12 6a2 2 0 110-4 2 2 0 010 4zm0 8a2 2 0 110-4 2 2 0 010 4zm-2 6a2 2 0 104 0 2 2 0 00-4 0z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                                      <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div id="empty-profile" class="m-8 flex flex-col justify-center items-center">
        <a href="#">
            <img src="./emptyCart.4e943399.png" alt="" class="my-4 p-4">
        </a>
        <a href="view-all-products.php" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-300 ease-in-out">Shop Now</a>
    </div>



<?php endif; ?>

<?php require "./includes/footer.php"; ?>
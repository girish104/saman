<?php require "./includes/header.php"; ?>

<div class="product-container">
    <div class="img-container">
        <img src="./includes/landing-page-img.jpg" alt="">
        <h3>Cart</h3>
        <div class="heading-info">
            <a href="http://localhost/saman">Home</a> / <span>Cart</span>
        </div>
    </div>
    <div class="products-container">
        <div class='container mx-auto px-4 sm:px-8'>
            <div class='py-8'>
                <div class='-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto'>
                    <div class='inline-block min-w-full shadow-md overflow-hidden'>
                        <table class='min-w-full leading-normal table' id="table">
                            <thead>
                                <tr>
                                    <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider'>
                                        Product
                                    </th>
                                    <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider'>
                                        Price
                                    </th>
                                    <th class='px-5 py-3 border-b-2 border-gray-200 bg-gray-100'></th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <!-- Your PHP code for generating cart items will go here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar container w-3/5 mt-7 mx-auto px-4 sm:px-8">
            <div class="sidebar-content">
                <div class="total-price font-bold">
                    <p>Subtotal: <span id="subtotal-amount">$0.00</span></p>
                </div>
                <form action="checkout.php" class="cart-checkout" method="POST">
                    <button type="submit" name="submit" class="w-full mt-4 bg-teal-700 text-white font-bold text-base md:text-lg py-3 px-6 rounded-md cursor-pointer transition duration-300 ease-in-out hover:bg-teal-600 hover:text-white">
                        Checkout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<div class="empty-cart">
    <a href="index.php">
        <img src="images/100042121862329.60ce32d236844.png" alt="">
    </a>
</div>



<script src="jquery.js"></script>
<script>
    $(document).ready(function() {

        function load_cart() {
            var userId = "<?php echo isset($_SESSION['userId']) ? $_SESSION['userId'] : '' ?>";
            $.ajax({
                url: "ajax/update-cart.php",
                type: "POST",
                data: {
                    userId: userId,
                },
                success: function(data) {
                    if (data) {
                        $("#table-body").html(data);
                    }
                    updateTotalPrice();
                }
            });
        }
        load_cart();

        $(document).on("click", ".delete", function(e) {
            var userId = '<?php echo isset($_SESSION['userId']) ? $_SESSION['userId'] : '' ?>';
            var productId = $(this).data('product-id');
            e.preventDefault();
            $.ajax({
                url: "ajax/delete-cart.php",
                type: "POST",
                data: {
                    productId: productId,
                    userId: userId,
                },
                success: function(data) {
                    if (data && data != 0) {
                        load_cart();
                    }
                    if (data <= 0) {

                        $(".empty-cart").show();
                        load_cart();
                    }
                }
            });
        });

        function updateTotalPrice() {
            var userId = '<?php echo isset($_SESSION['userId']) ? $_SESSION['userId'] : '' ?>';
            $.ajax({
                url: "ajax/get-cart-price.php", // PHP file to get the updated cart price
                type: "POST",
                data: {
                    userId: userId,
                },
                success: function(data) {
                    if (parseFloat(data) > 0) {
                        $("#subtotal-amount").html(" $ " + data);
                        $(".empty-cart").hide();
                    } else {
                        $("#table-body").empty();
                        $("#table").hide();
                        $("#subtotal-amount").hide();
                        $(".empty-cart").show();
                        $(".main-content").hide();
                        $(".sidebar").hide();
                    }
                }
            });
        }
    });
</script>

<?php require "./includes/footer.php"; ?>
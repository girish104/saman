<?php require "./includes/config.php"; ?>
<?php require "./includes/header.php"; ?>


<?php


$selectQuery = "SELECT * FROM products ORDER BY RAND() LIMIT 3";
$products = $app->selectAll($selectQuery);

?>


<section>
    <main>
        <div class="hero">
            <div class="hero-text">
                <h1 class="font-bold">Welcome to Saman</h1>
                <h3 class="font-semibold">Shop everything you need, all in one place.</h3>
                <button>
                    <a href="view-all-products.php">Explore More <i class="fa-solid fa-arrow-right"></i></a>
                </button>
            </div>
        </div>
        <!-- <div class="recent-product"></div> -->
    </main>

    <div class="recent-page">
        <p class="font-semibold" style="text-align: center; font-size:40px; font-family:Arial, Helvetica, sans-serif; margin:30px 0px;">Best of Saman</p>

        <div class="recent-product-cards-box-full">
            <?php foreach ($products as $product) : ?>
                <div class="recent-product-cards-box">
                    <div class="recent-product-card">
                        <div class="product-img"><img src="<?php echo $product->product_image; ?>" class="p-4" /></div>
                        <div name="" class="product-title"><?php echo substr(trim($product->product_title), 0, 20) . (strlen($product->product_title) > 20 ? '...' : ''); ?>
                        </div>
                        <div class="product-price font-medium">$<?php echo $product->product_price; ?></div>
                        <div class="product-rating">
                            <?php for ($i = 1; $i <= $product->product_rating; $i++) {
                            ?> <i class="fa-solid fa-star" style="color: #ffbf00"></i> <?php
                                                                                    } ?>
                        </div>


                        <div class="recent-cart">
                            <?php
                            if (isset($_SESSION['userId'])) {
                                $userId = $_SESSION['userId'];
                                $productId  = $product->product_id;
                                $selectFromCart = "SELECT COUNT(*) as count FROM cart WHERE user_id = '$userId' AND cart_product_id = $productId";
                                $cartCount = $app->selectOne($selectFromCart);
                            } else {
                                $cartCount = (object) ['count' => 0];
                            }
                            ?>


                            <?php if ($cartCount->count > 0) : ?>
                                <button class="w-full recent-cart font-bold " data-product-id="<?php echo $product->product_id; ?>" disabled style="cursor: not-allowed;">ADDED TO CART</button>
                            <?php else : ?>
                                <button class=" w-full recent-cart font-bold" data-product-id="<?php echo $product->product_id; ?>">ADD TO CART</button>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="view-all-products">
            <button>
                <a href="view-all-products.php">view all products <i class="fa-solid fa-arrow-right"></i> </a>
            </button>
        </div>
    </div>
    <div class="categories">
        <div class="categories-boxes">
            <div class="box">
                <p>man</p>
            </div>
            <div class="box">
                <p>women</p>
            </div>
            <div class="box">
                <p>kids</p>
            </div>
            <div class="box">
                <p>appliances</p>
            </div>
            <div class="box">
                <p>electronics</p>
            </div>
            <div class="box">
                <p>crafts</p>
            </div>
            <div class="box">
                <p>grocery</p>
            </div>
            <div class="box">
                <p>furniture</p>
            </div>
        </div>
    </div>
</section>
<script src="./jquery.js"></script>
<script src="products-box.js"></script>
<script>
    $(document).ready(function() {
        // Add click event handler for "Add to Cart" button
        $('.recent-cart .recent-cart').on('click', function() {
            console.log('Add to Cart button clicked');
            var productId = $(this).data('product-id');
            var userId = '<?php echo isset($_SESSION['userId']) ? $_SESSION['userId'] : '' ?>';
            var button = $(this);
            if (userId) {
                $.ajax({
                    url: 'add-to-cart.php',
                    type: 'POST',
                    data: {
                        productId: productId,
                        userId: userId
                    },
                    success: function(response) {
                        if (response == 'success') {
                            // Change the text of the button and disable it
                            button.text('ADDED TO CART').attr('disabled', true);
                        }
                    }
                });
            } else {
                window.location.href = 'login.php';
            }
        });

        function load_wishlist() {
            var userId = '<?php echo isset($_SESSION['userId']) ? $_SESSION['userId'] : '' ?>';
            $.ajax({
                url: "load-wishlist-index.php",
                type: "POST",
                data: {
                    userId: userId,
                },
                success: function(data) {
                    if (data) {
                        var wishlist = JSON.parse(data);
                        $('.add-to-wishlist').each(function() {
                            var productId = $(this).data('product-id');
                            if (wishlist.includes(productId)) {
                                $(this).html("<i class='fa-solid fa-heart' style='color: #ff0000;'></i>");
                            } else {
                                $(this).html("<i class='fa-regular fa-heart'></i>");
                            }
                        });
                    }
                }
            })
        }

        load_wishlist();

        function add_to_wishlist() {

            $(document).on("click", ".add-to-wishlist", function(e) {
                var userId = '<?php echo isset($_SESSION['userId']) ? $_SESSION['userId'] : '' ?>';
                var productId = $(this).data('product-id');
                e.preventDefault();
                $.ajax({
                    url: "add-to-wishlist.php",
                    type: "POST",
                    data: {
                        productId: productId,
                        userId: userId,
                    },
                    success: function(data) {
                        console.log(data);
                        if (data) {
                            load_wishlist();
                        }
                    }

                });
            });
        }

        add_to_wishlist();


    })
</script>

<?php require "./includes/footer.php"; ?>
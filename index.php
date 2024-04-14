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
    <?php require "./includes/categories.php"; ?>

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
                    url: 'ajax/add-to-cart.php',
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

    })
</script>

<?php require "./includes/footer.php"; ?>
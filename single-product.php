<?php require "./includes/config.php"; ?>
<?php require "./includes/header.php"; ?>


<?php


if (isset($_GET['id'])) {
  $product_id = $_GET['id'];
  $selectSingleQuery = "SELECT * FROM products WHERE product_id = $product_id";
  $product = $app->selectOne($selectSingleQuery);
  if (!$product) {
    header("HTTP/1.0 404 Not Found");
    include("404.php");
    exit();
  }
} else {

  header("HTTP/1.0 404 Not Found");
  include("404.php");
  exit();
}

?>

<div class="product-container">
  <div class="img-container">
    <img src="./includes/landing-page-img.jpg" alt="">
    <h3><?php echo substr(trim($product->product_title), 0, 20) . (strlen($product->product_title) > 15 ? '...' : ''); ?></h3>
    <div class="heading-info">
      <a href="http://localhost/saman">Home</a> / <span class="font-semibold"><?php echo $product->product_category; ?></span> / <span><?php echo $product->product_title; ?></span>
    </div>
  </div>
  <div class="single-product-container">
    <div class="single-product-img">
      <img src="<?php echo $product->product_image; ?>" alt="" style="width: 200px; height:200px;">
    </div>
    <div class="single-product-details">
      <div class="single-product-name">
        <?php echo $product->product_title; ?>
      </div>
      <div class="single-product-rating">
        <?php for ($i = 1; $i <= $product->product_rating; $i++) {
        ?> <i class="fa-solid fa-star" style="color: #ffbf00"></i> <?php
                                                                  } ?>
      </div>

      <div class="single-product-description">
        <?php echo $product->product_description; ?>
      </div>
      <div class="single-product-price">
        Rs <?php echo $product->product_price; ?>
      </div>
      <div class="single-product-shipping-line">
        3-DAY SHIPPING
      </div>
    </div>
    <div class="single-product-to-cart">
      <div class="total-price-line">
        TOTAL PRICE :
      </div>
      <div class="single-product-price">
        Rs <?php echo $product->product_price; ?>
      </div>
      <hr>

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

      <div class="single-product-button">
        <?php if ($cartCount->count > 0) : ?>
          <button class="single-product-add-to-cart" style="cursor: not-allowed;" disabled data-product-id="<?php echo $product->product_id; ?>">
            ADDED TO CART
          </button>
        <?php else : ?>
          <button class="single-product-add-to-cart" data-product-id="<?php echo $product->product_id; ?>">
            ADD TO CART
          </button>
        <?php endif; ?>
        <button class="single-product-buy-now">
          BUY NOW
        </button>
      </div>
    </div>
  </div>
</div>


<!-- similar products  -->

<?php


$selectQuery = "SELECT * FROM products ORDER BY RAND() LIMIT 3";
$products = $app->selectAll($selectQuery);

?>

<div class="similar-products">

  <div class="recent-page">
    <p class="font-semibold" style="text-align: center; font-size:30px; font-family:Arial, Helvetica, sans-serif; margin:40px 0px;">Similar Products</p>

    <div class="recent-product-cards-box-full">
      <?php foreach ($products as $product) : ?>
        <div class="recent-product-cards-box">
          <div class="recent-product-card">
            <div class="product-img"><img src="<?php echo $product->product_image; ?>" /></div>
            <div name="" class="product-title"> <?php echo substr(trim($product->product_title), 0, 20) . (strlen($product->product_title) > 15 ? '...' : ''); ?></div>
            <div class="product-price font-medium">$<?php echo $product->product_price; ?></div>
            <div class="product-rating">
              <?php for ($i = 1; $i <= $product->product_rating; $i++) {
              ?> <i class="fa-solid fa-star" style="color: #ffbf00"></i> <?php
                                                                        } ?>
            </div>


            <div class="recent-cart w-full">
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
  </div>



</div>

<script src="./jquery.js"></script>

<script>
  $(document).ready(function() {
    // Add click event handler for "Add to Cart" button
    $('.single-product-add-to-cart').on('click', function() {
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
              button.text('ADDED TO CART').attr('disabled', true);
              button.css({
                "cursor": "not-allowed"
              })
            }
          }
        });
      } else {
        window.location.href = 'login.php';
      }
    });

  })
</script>


<!-- similar products script  -->
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
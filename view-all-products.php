<?php require "./includes/config.php"; ?>
<?php require "./includes/header.php"; ?>

<div class="product-container">
    <div class="img-container">
        <img src="./includes/landing-page-img.jpg" alt="">
        <h3>Products</h3>
        <div class="heading-info">
            <a href="http://localhost/saman">Home</a> / <span>Category</span>
        </div>
    </div>
    <div class="products-container">
        <div class="sidebar">
            <div class="sort-category">
                <label for="sort">Filter:</label>
                <select name="sort" id="sort">
                    <option value="sort">All</option>
                    <option value="low">Price -- Low to High</option>
                    <option value="high">Price -- High to Low</option>
                    <option value="new">Newest First</option>
                </select>
                <select name="category" id="category">
                    <option value="category">Category</option>
                    <option value="man">Man</option>
                    <option value="woman">Woman</option>
                    <option value="kids">Kids</option>
                    <option value="appliances">Appliances</option>
                    <option value="electronics">Electronics</option>
                    <option value="crafts">Crafts</option>
                    <option value="grocery">Grocery</option>
                    <option value="furniture">Furniture</option>
                </select>
            </div>
        </div>
        <div class="main-content">
            <table class="table" id="table">
                <tbody id="table-body">
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="./jquery.js"></script>

<!-- Rest of the JavaScript code remains unchanged -->

</script>

<script>
    $(document).ready(function() {

        function load_allProducts(sortValue, categoryValue) {
            if (typeof sortValue === 'undefined' && typeof categoryValue === 'undefined') {
                sortValue = 'sort';
                categoryValue = 'category';
            }
            $.ajax({
                url: "load_allProducts.php",
                type: "POST",
                data: {
                    sortValue: sortValue,
                    categoryValue: categoryValue,
                },
                success: function(data) {
                    if (data) {
                        $("#table-body").html(data);
                        load_viewAll();
                    }
                }
            });
        }
        load_allProducts();


        $('#sort').on('change', function() {
            var sortValue = $(this).val();
            var categoryValue = $('#category').val();
            load_allProducts(sortValue, categoryValue);
        });

        $('#category').on('change', function() {
            var categoryValue = $(this).val();
            var sortValue = $('#sort').val();
            load_allProducts(sortValue, categoryValue);
        });

        function load_viewAll() {
            var userId = '<?php echo isset($_SESSION['userId']) ? $_SESSION['userId'] : ''; ?>';
            $.ajax({
                url: "add-cart-view-all-load.php",
                type: "POST",
                data: {
                    userId: userId,
                },
                success: function(data) {
                    if (data) {
                        var added = JSON.parse(data);
                        $('.buy-now-btn').each(function() {
                            var productId = $(this).data('product-id');
                            if (added.includes(productId)) {
                                $(this).text('ADDED TO CART').prop('disabled', true).css('cursor', 'not-allowed');
                            } else {
                                $(this).text('ADD TO CART').prop('disabled', false).css('cursor', 'pointer');
                            }
                        });
                    }
                }
            });
        }


        $('body').on('click', '.buy-now-btn', function() {
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
                            load_viewAll();
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
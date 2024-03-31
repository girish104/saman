<?php require "./includes/config.php"; ?>
<?php require "./includes/header.php"; ?>

<div class="product-container">
    <div class="img-container">
        <img src="./includes/landing-page-img.jpg" alt="">
        <h3>Search Results</h3>
        <div class="heading-info">
            <a href="http://localhost/saman">Home</a> / <span>Category</span>
        </div>
    </div>
    <div class="products-container">
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

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->



<script>
    $(document).ready(function() {
        // Extract the search query value from the URL parameter
        var searchValue = getParameterByName('value');

        // Make the AJAX request with the search query value
        $.ajax({
            url: "load_allSearchProducts.php",
            type: "GET",
            data: {
                value: searchValue, // Pass the search query value here
            },
            success: function(data) {
                if (data) {
                    $("#table-body").html(data);
                    load_viewAll();
                }
            }
        });

        // Function to extract URL parameters
        function getParameterByName(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }

        // Function to load additional view related to products
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

        // Event listener for buy-now-btn click
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
    });
</script>

<?php require "./includes/footer.php"; ?>
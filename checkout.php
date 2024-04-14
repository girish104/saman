<?php require "./includes/header.php"; ?>

<div class="product-container">
    <div class="img-container">
        <img src="./includes/landing-page-img.jpg" alt="">
        <h3>Confirm Order</h3>
        <div class="heading-info">
            <a href="http://localhost/saman">Home</a> / <span>Cart</span> / <span>Confirm Order</span>
        </div>
    </div>
    <div class="checkout-content">
        <div class="table-responsive">
            <table class="table" id="table">
                <tbody id="table-body">
                </tbody>
            </table>
            <div class="subtotal">
                <p>TOTAL (1 Item) <span id="subtotal-amount">$ 00</span></p>
            </div>
        </div>
        <div class="form-container">
            <form action="">

                <div class="form-title">Shipping Address</div>
                <div class="form-field">
                    <label for="name">Name:</label>
                    <input type="text" id="name" placeholder="Enter your name" required>
                </div>
                <div class="form-field">
                    <label for="address">Address:</label>
                    <textarea id="address" rows="4" placeholder="Enter your address" required></textarea>
                </div>
                <div class="form-field">
                    <label for="phone">Phone Number:</label>
                    <input type="number" id="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="form-title">Coupon Code <span class="coupon-span">(if any)</span></div>
                <div class="form-field">
                    <input type="text" id="coupon" placeholder="Enter coupon code">
                </div>
                <button class="confirm-order">Confirm Order</button>
            </form>
        </div>
    </div>
</div>

<!-- Payment Modal -->
<div class="modal" id="paymentModal">
    <div class="modal-content">
        <h2>Pay Now</h2>
        <p>Name : <span id="modal-name"></span></p>
        <p>Address: <span id="modal-address"></span></p>
        <p>Phone: <span id="modal-phone"></span></p>
        <p>Total Amount: <span id="modal-amount">$ 00</span></p>
        <button id="payWithPaytmBtn">Pay with Paytm</button>
    </div>
</div>


<script src="jquery.js"></script>
<script>
    $(document).ready(function() {

        let productIds = [];

        function load_cart() {
            var userId = '<?php echo isset($_SESSION['userId']) ? $_SESSION['userId'] : '' ?>';
            $.ajax({
                url: "ajax/update-cart.php",
                type: "POST",
                data: {
                    userId: userId,
                },
                success: function(data) {
                    if (data) {
                        $("#table-body").html(data);
                        $(".delete").hide();
                        $("#table-body .delete").each(function() {
                            let productId = $(this).data('product-id');
                            productIds.push(productId);
                        });
                    }
                    updateTotalPrice();
                }
            });
        }



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
                    }
                }
            });
        }

        load_cart();

        var name, address, phone;

        function checkRequiredFields() {
            name = $("#name").val(); // Assign values to the variables
            address = $("#address").val();
            phone = $("#phone").val();

            if (name === "" || address === "" || phone === "") {
                return false;
            }

            return true;
        }

        $('.confirm-order').on('click', function() {
            if (!checkRequiredFields()) {
                return;
            }

            $("#paymentModal #modal-amount").text($("#subtotal-amount").text());
            $("#modal-name").text(name); // Now these variables are accessible
            $("#modal-address").text(address); // from the click event handler
            $("#modal-phone").text(phone);

            $("#paymentModal").show();
            event.preventDefault();

            $("#payWithPaytmBtn").click(function() {

                $.ajax({
                    url: "ajax/pay.php",
                    type: "POST",
                    data: {
                        productIds: productIds,
                    },
                    success: function(data) {
                        // Debugging code
                        if (data === "success") {
                            window.location = 'profile.php';

                        }
                    }

                });
            });


        });
    });
</script>

<?php require "./includes/footer.php"; ?>
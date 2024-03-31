
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="buy-process.css">
    <title>product</title>
</head>

<body>
    <div class="container">
        <div class="payment-box">


            <?php
            echo '<h1>Process To Buy</h1>
            <div class="product-detail">
                <img src="' . $img . '" alt="product image">
                <div class="product-info">';

            echo '<div class="data">
                            <div class="title-data">
                                <div class="product-detail-title">' . $title . '</div>
                                <div class="product-detail-price">₹' . $price . '</div>
                                <div class="product-detail-rating">';
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $rating) {
                    echo '<i class="fa-solid fa-star" style="color:#FFBF00;"></i>';
                } else {
                    echo '<i class="fa-regular fa-star"></i>';
                }
            };
            echo '
                                </div>
                            </div>
                            <div class="product-detail-description">' . $description . '</div>
                        </div>
                </div>';
            ?>
        </div>
        <form action="order-done.php" method="post">
            <div class="get-card-details">
                <h2>Enter your card Details</h2>
                <div class="payment-method">
                    <input type="text" required maxlength="15" name="card-number" id="card-number" placeholder="Enter card number">
                    <div class="more">
                        <input type="month" required name="ex-month" id="ex-month">
                        <input type="password" required maxlength="3" name="CVV" id="CVV" placeholder="CVV">
                    </div>
                    <input type="text" required name="card-holder-name" id="card-holder-name" placeholder="Enter Card holder name">
                </div>

            </div>
            <div class="btn">

                <button type="submit">BUY</button>
            </div>
        </form>



    </div>
    </div>
</body>

</html>
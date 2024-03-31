<?php require "./includes/config.php"; ?>
<?php require "./includes/App.php"; ?>

<?php $app = new App;
$app->startingSession(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png" />
    <link rel="manifest" href="/site.webmanifest" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo APPURL; ?>/style.css?v=<?php $version ?>" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- profile css link -->

    <?php if ($_SERVER['PHP_SELF'] === '/saman/profile.php') : ?>
        <link rel="stylesheet" href="profile.css">
    <?php endif; ?>

    <!-- cart css link -->

    <?php if ($_SERVER['PHP_SELF'] === '/saman/cart.php') : ?>
        <link rel="stylesheet" href="cart.css">
    <?php endif; ?>

    <!-- wishlist css link -->

    <?php if ($_SERVER['PHP_SELF'] === '/saman/wishlist.php') : ?>
        <link rel="stylesheet" href="wishlist.css">
    <?php endif; ?>

    <!-- view all products css link -->

    <?php if ($_SERVER['PHP_SELF'] === '/saman/view-all-products.php') : ?>
        <link rel="stylesheet" href="view-all-products.css?v=<?php $version; ?>">
    <?php endif; ?>

    <!-- single product css link -->

    <?php if ($_SERVER['PHP_SELF'] === '/saman/single-product.php') : ?>
        <link rel="stylesheet" href="single-product.css?v=<?php $version; ?>">
    <?php endif; ?>

    <!-- single buy cart css link -->

    <?php if ($_SERVER['PHP_SELF'] === '/saman/search-results.php') : ?>
        <link rel="stylesheet" href="search-results.css?v=<?php $version; ?>">
    <?php endif; ?>


    <!-- checkout css link -->

    <?php if ($_SERVER['PHP_SELF'] === '/saman/checkout.php') : ?>
        <link rel="stylesheet" href="checkout.css?v=<?php $version; ?>">
    <?php endif; ?>

    <!-- pay css link -->

    <?php if ($_SERVER['PHP_SELF'] === '/saman/pay.php') : ?>
        <link rel="stylesheet" href="pay.css?v=<?php $version; ?>">
    <?php endif; ?>

    <link rel="stylesheet" href="font.css">
    <title>saman - Find All Your Favorite Brands Here</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <header class="header" id="header">
        <div class="logo">
            <a href="/saman">
                <img src="gallery/logo.png" alt="Saman Logo">

            </a>
        </div>
        <div class="search">
            <form id="searchForm" action="search-results.php" method="GET">
                <input type="search" name="value" id="searchInput" placeholder="Search for Products, Brands and More">
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="header-items">
            <a href="<?php echo isset($_SESSION['userId']) ? '/saman/profile.php' : '/saman/login.php'; ?>">
                <i class="fas fa-user"></i>
            </a>
            <a href="/saman/cart.php">
                <i class="fas fa-shopping-cart"></i>
            </a>
            <a href="/saman/login.php">

                <i class="fas fa-sign-in-alt"></i>
            </a>
        </div>
        <div class="burger-menu">
            <i class="fas fa-bars text-white" id="burger-icon"></i>
            <div class="menu-dropdown" id="menu-dropdown">
                <a href="/saman">Home</a>

                <a href="/saman/view-all-products.php">Products</a>
                <a href="/saman/cart.php">Cart</a>
                <a href="<?php echo isset($_SESSION['userId']) ? '/saman/logout.php' : '/saman/login.php'; ?>"><?php echo isset($_SESSION['userId']) ? 'Logout' : 'Login' ?> </a>
                <!-- Include additional menu options here -->
            </div>
        </div>
    </header>



    <script src="burger.js"></script>
    <div id="content"></div>
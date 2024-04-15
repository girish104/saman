<?php require "./includes/config.php"; ?>
<?php require "./includes/App.php"; ?>

<?php

$app = new App;
$app->startingSession();
$app->validateLoginSession();


// register user 


if (isset($_POST['register'])) {


    $register_insert_query = "INSERT INTO users (user_id, user_email, user_password) VALUES (:user_id, :user_email, :user_password)";

    $userId = $_POST['user_id'];
    $userEmail = $_POST['user_email'];
    $userPassword = password_hash($_POST['user_password'], PASSWORD_DEFAULT);

    $arr = [
        ":user_id" => $userId,
        ":user_email" => $userEmail,
        ":user_password" => $userPassword,
    ];

    $path = "login.php";

    $register_query = $app->insert($register_insert_query, $arr, $path);
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="page-title"></title>
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-login.css?v=<?php $version; ?>">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->


</head>

<body>


    <div class="page-body">

        <div class="form-body mt-4">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log in</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>



            <div class="intro">
                <h1>Welcome</h1>
            </div>

            <!-- HTML code -->

            <form id="login" class="input-group" method="post" action="login.php">
                <input type="text" class="input-field" name="login_id" id="login_id" placeholder="User Id" autocomplete="off" required>
                <input type="password" class="input-field" name="login_password" id="login_password" autocomplete="off" placeholder="Enter password" required>

                <!-- login user   -->

                <?php if (isset($_POST['login'])) {

                    $loginId = $_POST['login_id'];
                    $loginPassword = $_POST['login_password'];

                    $loginQuery = "SELECT * FROM users WHERE user_id = '$loginId'";


                    $creds = [

                        "login_id" => $loginId,
                        "login_password" => $loginPassword,
                    ];

                    $path = "http://localhost/saman";

                    $data =  $app->login($loginQuery, $creds, $path);

                    if ($data == false) {
                        echo '<div style="color: red; font-size: 12px;">Invalid username or password</div>';
                    }
                }
                ?>

                <div class="forgot">
                    <span><a href="#">Forgot password?</a></span>
                </div>
                <button type="submit" name="login" class="submit-btn submit-btn-margin">Log in</button>

            </form>

            <form id="register" class="input-group" method="post" action="login.php">
                <input type="text" class="input-field" name="user_id" id="user_id" placeholder="User Id" autocomplete="off" required>
                <span id="usernameResult"></span>
                <span id="usernameError" class="error-message"></span>

                <input type="email" class="input-field" name="user_email" id="user_email" placeholder="Enter email id" autocomplete="off" required>
                <span id="emailResult"></span>
                <span id="emailError" class="error-message"></span>

                <input type="password" class="input-field" name="user_password" id="user_password" placeholder="Enter password" autocomplete="off" required>
                <span id="passwordError" class="error-message"></span>

                <div class="agreement">
                    <input type="checkbox" class="check-box" name="checkbox" id="checkbox" required>
                    <span><a href="#">I agree to the terms & conditions</a></span>
                </div>

                <button type="submit" name="register" id="registerButton" class="submit-btn">Register</button>
            </form>



        </div>

    </div>

    <script src="javascript/login-register.js?v=<? $version ?>"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('#user_id').keyup(function() {
                let username = $(this).val();

                $.ajax({
                    url: 'ajax/checkRegister.php',
                    type: 'POST',
                    data: {
                        username: username
                    },
                    success: function(data) {
                        $("#usernameResult").html(data);
                        if (data.trim() === "") {
                            $("#registerButton").prop("disabled", false);
                        } else {
                            $("#registerButton").prop("disabled", true);
                        }

                    }

                });
            });

            $('#user_email').keyup(function() {
                var email = $(this).val();
                $.ajax({
                    url: 'ajax/checkRegisterEmail.php', // Update with the path to your PHP file for checking email
                    type: 'POST',
                    data: {
                        email: email
                    },
                    success: function(data) {
                        $('#emailResult').html(data);
                        if (data.trim() === "") {
                            $("#registerButton").prop("disabled", false);
                        } else {
                            $("#registerButton").prop("disabled", true);
                        }
                    }
                });
            });

        });
    </script>




</body>

</html>
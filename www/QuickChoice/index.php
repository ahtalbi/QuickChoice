<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Views/css/index.css">
    <link rel="icon" type="image/x-icon" href="Views/assets/img/all/logo-menu.ico">
    <title>Sing In</title>
    <style>
        .error {
            color: red;
            font-size: 10px;
            width: 100%;
            margin-bottom: 8px;
            margin-top: 5px;
            padding: 5px;
            background-color: rgba(255, 0, 0, 0.16);
        }

        .is_register {
            color: green;
            font-size: 10px;
            width: 100%;
            margin-bottom: 8px;
            margin-top: 5px;
            padding: 5px;
            background-color: rgba(0, 128, 0, 0.201);
        }
    </style>
</head>

<body>
    <div class="container" id="container">
        <form action="Models/auth/login.php" method="post" id="loginForm">
            <h1>Sign in</h1>
            <input type="text" class="username" name="log_username" placeholder="Username">
            <input type="password" class="password" name="log_password" placeholder="Password">
            <?php if (isset($_GET['error_login'])) { ?>
                <h6 class="error">
                    <?php echo "username ou password not valid"; ?>
                </h6>
            <?php } ?>
            <?php if (isset($_GET['is_register'])) { ?>
                <h6 class="is_register">
                    <?php echo "Register Successfully ! Please login now."; ?>
                </h6>
            <?php } ?>
            <?php if (isset($_GET['action'])) { ?>
                <h6 class="is_register">
                    <?php echo "verify votre email"; ?>
                </h6>
            <?php } ?>
            <a href="Components/Forgot.php" class="Forgot_password">Forgot your password?</a>
            <button type="submit" name="log_submit" class="loginBtn">Sign In</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="Controllers/login.js"></script> -->
</body>

</html>
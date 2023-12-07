<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bancoria</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
    <link rel="shortcut icon" href="../../public/images/Favicon.ico" type="image/x-icon">
    <script defer src="../../public/js/app.js"></script>
</head>

<body class="login">
    <article class="login-form">
        <div id="formWrapper">

            <div id="form">
                <div class="logo">
                    <img src="../../public/images/Logo.svg" alt="">
                </div>
                <div class="form-item">
                    <p class="formLabel">Email</p>
                    <input type="email" name="email" id="email" class="form-style" autocomplete="off" />
                </div>
                <div class="form-item">
                    <p class="formLabel">Password</p>
                    <input type="password" name="password" id="password" class="form-style" />
                    <!-- <div class="pw-view"><i class="fa fa-eye"></i></div> -->
                    <p><a href="#"><small>Forgot Password ?</small></a></p>
                </div>
                <div class="form-item">
                    <p class="pull-left"><a href="#"><small>Register</small></a></p>
                    <input type="submit" class="login pull-right" value="Log In">
                    <div class="clear-fix"></div>
                </div>
            </div>
        </div>
    </article>
</body>

</html>
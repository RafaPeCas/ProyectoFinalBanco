<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php?form=login");
    exit();
}

$from = isset($_GET['from']) ? $_GET['from'] : '';

?>

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

<body>
    <header>
        <?php
        include_once("header.php");
        ?>
        <section id="banner">
            <video autoplay muted loop id="video-bg">
                <source src="../../public/images/banner.mp4" type="video/mp4">
            </video>
        </section>
    </header>
    <main>
        <?php
        if ($from === 'login') {
            include("welcomeLogin.php");
        } elseif ($from === 'signin') {
            include("welcomeSignin.php");
        }
        ?>
    </main>
    <?php
    include_once("footer.php");
    ?>
</body>

</html>
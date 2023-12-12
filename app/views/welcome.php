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
    <script defer src="../../public/js/welcome.js"></script>
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
            <div class="bannerContent">
                <img src="../../public/images/Logo.svg" alt="">
                <h1>Bancoria</h1>
            </div>
        </section>
    </header>
    <main id="welcomeMain">
        <p id="amount" class="ocultar">
            <?php
            echo  hexdec($_SESSION["cuenta"]["saldo"]);
            ?>
        </p>
        <p id="favorito" class="ocultar">
            <?php
            echo  $_SESSION["cuenta"]["favorito"];
            ?>
        </p>
        <article class="welcomeWrapper">
            <section id="welcome">
                <div id="userPicture">
                    <img src="../../public/images/mauroResized.jpeg" alt="">
                </div>
                <section id="info">
                    <div id="saludito">
                        <h1>Bienvenido de nuevo <?php echo $_SESSION["usuario"]["nombre"] . "  " . $_SESSION["usuario"]["passsigin"] ?> </h1>
                    </div>
                    <section class="saluditoTemporal">
                        <img class="calendarIcon" src="../../public/images/date-icon.svg" alt="">
                        <div id="datetime"></div>
                    </section>
                </section>
            </section>

            <section id="userMoney">
                <h2>Saldo: <span id="amountLbl"><?php echo number_format(hexdec($_SESSION["cuenta"]["saldo"]) / 100, 2, '.', '.') ?></span><span id="currency"> €</span></h2>
            </section>
            <section id="moneyConverter">
                <p id="rublos" onmouseover="exchangeCurrency('₽')" onclick="favoritar(this)" onmouseleave="porDefecto()">₽</p>
                <p id="euros" onmouseover="exchangeCurrency('€')" onclick="favoritar(this)" onmouseleave="porDefecto()">€</p>
                <p id="dolares" onmouseover="exchangeCurrency('$')" onclick="favoritar(this)" onmouseleave="porDefecto()">$</p>
                <p id="yenes" onmouseover="exchangeCurrency('¥')" onclick="favoritar(this)" onmouseleave="porDefecto()">¥</p>
                <p id="libras" onmouseover="exchangeCurrency('£')" onclick="favoritar(this)" onmouseleave="porDefecto()">£</p>
            </section>
        </article>
        <article id="prestamos">

        </article>
    </main>
    <?php
    include_once("footer.php");
    ?>
</body>

</html>
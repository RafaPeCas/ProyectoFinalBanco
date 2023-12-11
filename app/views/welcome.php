<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php?form=login");
    exit();
}

$usuario = $_SESSION['usuario'];
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

    <div class="about">
        <a class="bg_links social portfolio" href="https://www.rafaelalucas.com" target="_blank">
            <span class="icon"></span>
        </a>
        <a class="bg_links social dribbble" href="https://dribbble.com/rafaelalucas" target="_blank">
            <span class="icon"></span>
        </a>
        <a class="bg_links social linkedin" href="https://www.linkedin.com/in/rafaelalucas/" target="_blank">
            <span class="icon"></span>
        </a>
        <a class="bg_links logo"></a>
    </div>

    <nav class="mainNav">
        <div class="mainNav__logo">Logo</div>
        <div class="mainNav__links">
            <a href="" class="mainNav__link">About</a>
            <a href="" class="mainNav__link">Projects</a>
            <a href="" class="mainNav__link">Team</a>
            <a href="" class="mainNav__link">Contacts</a>
        </div>
        <div class="mainNav__icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <g data-name="Layer 2" fill="#9197AE">
                    <g data-name="menu-2">
                        <rect width="24" height="24" transform="rotate(180 12 12)" opacity="0" />
                        <circle cx="4" cy="12" r="1" />
                        <rect x="7" y="11" width="14" height="2" rx=".94" ry=".94" />
                        <rect x="3" y="16" width="18" height="2" rx=".94" ry=".94" />
                        <rect x="3" y="6" width="18" height="2" rx=".94" ry=".94" />
                    </g>
                </g>
            </svg>
        </div>
    </nav>
    <header class="mainHeading">
        <div class="mainHeading__content">
            <article class="mainHeading__text">
                <p class="mainHeading__preTitle">nature</p>
                <h2 class="mainHeading__title">behind the mountains</h2>
                <p class="mainHeading__description">
                    Far far away, behind the word mountains, far from the countries
                    Vokalia and Consonantia, there live the blind texts.
                </p>
                <button class="cta">know more</button>
            </article>

            <figure class="mainHeading__image">
                <img src="https://images.unsplash.com/photo-1520856707909-75c4048cc858?ixlib=rb-1.2.1&auto=format&fit=crop&w=1534&q=80" alt="" />
            </figure>
        </div>
    </header>

    <main>
        <h1>BANCORIA</h1>
        <p>Invierte en tranquilidad</p>
        <img src="images/Logo.svg" alt="">
        <?php
        echo "<h1>Hola " . $_SESSION["usuario"]["nombre"] . " tu contraseña es " . $_SESSION["usuario"]["passsigin"] . "</h1>"
        ?>
        <a href="../../public/index.php">Inicio</a>
    </main>
    <?php
    include_once("footer.php");
    ?>
</body>

</html>
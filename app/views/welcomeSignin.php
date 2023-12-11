<p id="amount" class="ocultar">
    <?php
    echo  15200
    ?>
</p>
<article class="welcomeWrapper">
    <section id="welcome">
        <div id="userPicture">
            <img src="../../public/images/mauroResized.jpeg" alt="">
        </div>
        <section id="info">
            <div id="saludito">
                <h1>Bienvenido de nuevo <?php echo $_SESSION["usuario"]["nombre"] ?> </h1>
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
        <p onclick="exchangeCurrency('₽')">₽</p>
        <p onclick="exchangeCurrency('€')">€</p>
        <p onclick="exchangeCurrency('$')">$</p>
        <p onclick="exchangeCurrency('¥')">¥</p>
        <p onclick="exchangeCurrency('£')">£</p>
    </section>
</article>
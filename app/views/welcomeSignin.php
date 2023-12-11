<article>
    <section id="card 1">
        <section id="userPicture">
            <img src="../../public/images/mauroResized.jpeg" alt="">
        </section>
        <section id="info">
            <section id="datetime">
            </section>
            <section id="saludito">
                <h1>Bienvenido de nuevo <?php echo $_SESSION["usuario"]["nombre"] ?> </h1>
            </section>
            <section id="userMoney">
                <h2 id="moneyLbl">Saldo: <?php echo number_format(hexdec($_SESSION["cuenta"]["saldo"]) / 100, 2, ',', '.') ?> €</h2>
            </section>
            <section id="moneyConverter">
                <p>₽</p>
                <p>€</p>
                <p>$</p>
                <p>¥</p>
                <p>£</p>
            </section>
        </section>
    </section>
</article>
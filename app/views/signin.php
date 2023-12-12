<?php
if (isset($_SESSION['usuario'])) {
    session_destroy();
}
?>

<article class="login-form ocultar" id="formulario-2">
    <div id="formWrapper">
        <h1>BANCORIA</h1>
        <div class="logo">
            <img src="../../public/images/Logo.svg" alt="">
        </div>
        <h2>Crear cuenta</h2>
        <form action="../routes/procesarRegistro.php" method="post" name="signin" id="signin">

            <div class="form-item">
                <?php
                if ($error === "true") {
                    echo "<p class='bote error'> Ese DNI ya ha sido registrado </p>";
                }
                ?>
            </div>

            <div class="form-item">
                <p class="formLabel" id="nombre">Nombre:</p>
                <input type="text" name="nombre" id="nombre" class="form-style" placeholder="Rafael" />
            </div>

            <div class="grupo-form">
                <div class="form-item">
                    <p class="formLabel" id="apellido1">Apellido 1:</p>
                    <input type="text" name="apellido1" id="apellido1" class="form-style" placeholder="Pedrosa" />
                </div>
                <div class="form-item">
                    <p class="formLabel" id="apellido2">Apellido 2:</p>
                    <input type="text" name="apellido2" id="apellido2" class="form-style" placeholder="Castelo" />
                </div>
            </div>

            <div class="grupo-form">
                <div class="form-item">
                    <p class="formLabel" id="dniRegistro">DNI:</p>
                    <input type="text" name="dniRegistro" id="dniRegistro" maxlength="9" class="form-style" placeholder="12345678X" />
                </div>
                <div class="form-item">
                    <p class="formLabel" id="fNac">Fecha de nacimiento:</p>
                    <input type="date" name="fNac" id="fNac" class="form-style" />
                </div>
            </div>


            <div class="form-item">
                <p class="formLabel" id="email">Email:</p>
                <input type="text" name="email" id="email" class="form-style" placeholder="ejemplo@gmail.com" />
            </div>

            <div class="form-item">
                <p class="formLabel" id="direccion">Dirección:</p>
                <input type="text" name="direccion" id="direccion" class="form-style" placeholder="C/ calloria número 3" />
            </div>

            <div class="grupo-form">
                <div class="form-item">
                    <p class="formLabel" id="localidad">Localidad:</p>
                    <input type="text" name="localidad" id="localidad" class="form-style" placeholder="Sevilla" />
                </div>
                <div class="form-item">
                    <p class="formLabel" id="cp">Código postal:</p>
                    <input type="number" name="cp" id="cp" class="form-style" placeholder="42015" maxlength="5" />
                </div>
            </div>

            <div class="grupo-form" style="display: flex; justify-content: space-between; width:100%">
                <div class="form-item">
                    <p class="formLabel" id="provincia">Provincia:</p>
                    <input type="text" name="provincia" id="provincia" class="form-style" placeholder="Sevilla" />
                </div>
                <div class="form-item">
                    <p class="formLabel" id="pais">País:</p>
                    <input type="text" name="pais" id="pais" class="form-style" placeholder="España" />
                </div>
            </div>

            <div class="form-item">
                <p class="">¿Ya tienes cuenta? <a href="?error=false&form=login" onclick="cambiar()">Iniciar sesión</a></p>
                <input type="submit" name="btnRegistro" id="btnRegistro" class="login-button" value="Registrarse">
            </div>
        </form>
    </div>
</article>
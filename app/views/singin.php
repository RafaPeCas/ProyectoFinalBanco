<article class="login-form ocultar" id="formulario-2">
    <div id="formWrapper">
        <h1>BANCORIA</h1>
        <div class="logo">
            <img src="../../public/images/Logo.svg" alt="">
        </div>
        <h2>Crear cuenta</h2>
        <form action="" method="post" name="signin">

            <div class="form-item">
                <p class="formLabel" id="nombre">Nombre:</p>
                <input type="text" name="nombre" id="nombre" class="form-style" placeholder="Rafael" required/>
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

            <div class="form-item">
                <p class="formLabel" id="dniRegistro">DNI:</p>
                <input type="text" name="dniRegistro" id="dniRegistro" maxlength="9" class="form-style" placeholder="12345678X" />
            </div>

            <div class="form-item">
                <p class="formLabel" id="email">Email:</p>
                <input type="email" name="email" id="email" class="form-style" placeholder="ejemplo@gmail.com" />
            </div>

            <div class="form-item">
                <p class="formLabel" id="direccion">Dirección:</p>
                <input type="email" name="direccion" id="direccion" class="form-style" placeholder="C/ calloria número 3" />
            </div>

            <div class="grupo-form">
                <div class="form-item">
                    <p class="formLabel" id="localidad">Localidad:</p>
                    <input type="text" name="localidad" id="localidad" class="form-style" placeholder="Sevilla" />
                </div>
                <div class="form-item">
                    <p class="formLabel" id="cp">Código postal:</p>
                    <input type="number" name="cp" id="cp" class="form-style" placeholder="42015" />
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
                <p class="">¿Ya tienes cuenta? <a onclick="cambiar()">Iniciar sesión</a></p>
                <input type="submit" name="btnRegistro" id="btnRegistro" class="login-button" value="Registrarse">
            </div>
        </form>
    </div>
</article>
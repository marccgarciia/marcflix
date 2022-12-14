<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>
    <link rel="stylesheet" href="../static/css/estilosloginregistro.css">
    <link rel="icon" type="image/png" href="../static/img/logos/mr.png" />

</head>

<body>
    <div class="general">
    <main>
        <div class="contenedor__todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Iniciar sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para ver el mejor contenido</p>
                    <button id="btn__register">Registrarse</button>
                </div>
            </div>
            <!--Login y registro-->
            <div class="contenedor__login-register">
                <form action="" class="formulario__login">
                    <h2>INICIAR SESIÓN</h2>
                    <input type="text" placeholder="Correo Electronico">
                    <input type="password" placeholder="Contraseña">
                    <a href="principal.php"><button type="button" class="btn">Entrar</button></a>
                </form>

                <!--Registro-->
                <form action="" class="formulario__register">
                    <h2>REGISTRARSE</h2>
                    <input type="text" placeholder="Nombre Completo">
                    <input type="text" placeholder="Correo Electronico">
                    <input type="text" placeholder="Usuario">
                    <input type="password" placeholder="Contraseña">
                    <button class="btn">Registrarse</button>
                </form>
            </div>
        </div>
    </main>
    </div>

    <script src="../static/js/loginyregistro.js"></script>
</body>

</html>
<?php
session_start();
//Si la sesión ya esta iniciada no hay necesidad de desplegar el formulario, por lo que se envia al usuario a index.php
if ((isset($_SESSION["numCuenta"])) && (!isset($_POST["Volver"])))
{
    header("location: ./Resultado.php");
}
elseif((isset($_POST["Volver"])))
{
    echo '
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Inicio de Sesion</title>
            </head>
                <body>
                    <fieldset>
                        <legend>Validación de alumno</legend>
                        <form action="logicinit.php" method="post">
                            Ingresa tu numero de cuenta <input type="number" name="numCuenta" min=100000000  max=1000000000 required><br><br>
                            <input type="submit" value="Empezar" name ="Empezar">
                        </form>
                </fieldset>
                </body>
            </html>
        ';
}
else
{
    echo '
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Inicio de Sesion</title>
            </head>
                <body>
                    <fieldset>
                        <legend>Validación de alumno</legend>
                        <form action="logicinit.php" method="post">
                            Ingresa tu numero de cuenta <input type="number" name="numCuenta" min=100000000  max=1000000000 required><br><br>
                            <input type="submit" value="Empezar" name ="Empezar">
                        </form>
                </fieldset>
                </body>
            </html>
        ';
}
?>
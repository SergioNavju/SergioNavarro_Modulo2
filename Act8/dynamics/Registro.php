<?php
    include("./Config.php");
    $conexion= connectdb();
    session_start();
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
        <body>
            <fieldset>
                <legend>Ingresa los siguientes datos</legend>
                <form action="logicinit.php" method="post">
                    Ingresa tu Nombre: <input type="text" name="nombre" max= "50" required><br><br>
                    Ingresa tu Apellido Paterno: <input type="text" name="apePaterno" max= "50" required><br><br>
                    Ingresa tu Apellido Materno: <input type="text" name="apeMaterno" max= "50" required><br><br>
                    Area Elegida: 
                        <label for="area">
                            <select name="area">
                                <option value=1>Área 1 Ciencias Físico-Matemáticas y de las Ingenierías</option>
                                <option value=2>Área 2 Ciencias Biológicas y de la Salud</option>
                                <option value=3>Área 3 Ciencias Sociales</option>
                                <option value=4>Área 4 Artes y Humanidades</option>
                            </select>
                        </label>
                        <br><br>
                    Carrera:';
                            $SQL_SELECT = "SELECT * FROM carrera";
                            $SQL_Query = mysqli_query ($conexion, $SQL_SELECT);
                            echo '<label for="carrera">
                                        <select name="carrera">';
                            while ($row = mysqli_fetch_array($SQL_Query))
                            {
                                echo '<option value='. $row [0].'>'. $row [1].'</option>';
                            }
                            echo '</select>
                    </label>
                    <br><br>
                    <input type="submit" value="Continuar" name ="Continuar">
                </form>
        </fieldset>
        </body>
    </html>
    ';
?>
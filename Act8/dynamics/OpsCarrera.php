<?php
    include("./Config.php");
    $conexion= connectdb();
    session_start();
    $clave=$_SESSION ["carrera"];
    $SELECTclave="SELECT promedio FROM pase_regla WHERE clave_carrera = ($clave)";
    $QUERYclave= mysqli_query ($conexion, $SELECTclave);
    $ROWclave = mysqli_fetch_array($QUERYclave);
    if($ROWclave[0]!="0")
    {
            $clavecarrera=$_SESSION ["carrera"];
            $clavecarrera=intval($clavecarrera);
            //var_dump($clavecarrera);
            $SELECTubic="SELECT COUNT(id_ubicacion) FROM pase_regla WHERE clave_carrera=($clavecarrera)";
            $SELECTmodal="SELECT COUNT(id_modalidad) FROM pase_regla WHERE clave_carrera=($clavecarrera)";
            $QUERYubic= mysqli_query ($conexion, $SELECTubic);
            $QUERYmodal= mysqli_query ($conexion, $SELECTmodal);
            $ROWubic = mysqli_fetch_array($QUERYubic);
            $ROWmodal = mysqli_fetch_array($QUERYmodal);

            if($ROWubic[0] != "1" || $ROWmodal[0] !="1")
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
                            <legend><h1>Su Carrera Solicitada tiene más de una modalidad o sede </h1></legend>
                            <form action="./logicinit.php" method="POST">
                                <table border="0" style="text-align: left">
                                    <tbody>
                                        <label for= "opcion"><b>Selecciona la opcion de carrera que usted quiere</b>
                                            <br><br>
                                            <tr>
                                                <td><b>Nombre</b></td>
                                                <td><b>Modalidad</b></td>
                                                <td><b>Ubicacion</b></td>
                                                <td><b>Elegir</b></td>
                                            </tr>';
                $SELECTCarrera="SELECT * FROM pase_regla INNER JOIN carrera ON pase_regla.clave_carrera=carrera.clave_carrera 
                                INNER JOIN modalidad ON pase_regla.id_modalidad=modalidad.id_modalidad 
                                INNER JOIN ubicacion ON pase_regla.id_ubicacion=ubicacion.id_ubicacion
                                WHERE carrera.clave_carrera =($clavecarrera)";
                $QUERYCarrera= mysqli_query ($conexion, $SELECTCarrera);
                while ($ROWCarrera = mysqli_fetch_array($QUERYCarrera))
                {
                    echo '
                        <tr>
                            <td>'.$ROWCarrera [6].'</td>
                            <td>'.$ROWCarrera [8].'</td>
                            <td><label>'.$ROWCarrera [10].'</td>
                                <td><label><input type="radio" name ="opcion" value="'.$ROWCarrera [0].'" required></label></td>
                        </tr>
                    </label>
                    ';
                }
                    echo '
                        </tbody>
                    </table><br>
                    <input type="submit" value="Continuar" name ="Eleccion">
                </form>
                </fieldset>
                </body>
                </html>
                    ';
                    
            }
            else if($ROWubic[0] == "1" && $ROWmodal[0] == "1")
            {
                $SELECTCarrera="SELECT id_pase FROM pase_regla INNER JOIN carrera ON pase_regla.clave_carrera=carrera.clave_carrera 
                                INNER JOIN modalidad ON pase_regla.id_modalidad=modalidad.id_modalidad 
                                INNER JOIN ubicacion ON pase_regla.id_ubicacion=ubicacion.id_ubicacion
                                WHERE carrera.clave_carrera =($clavecarrera)";
                $QUERYCarrera= mysqli_query ($conexion, $SELECTCarrera);
                $ROWCarrera = mysqli_fetch_array($QUERYCarrera);
                $_SESSION ["ID_PASE"] = $ROWCarrera[0];
                header("location: ./Calif_IV.php");
            }
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
            <h2>Para esa carrera no hay pase reglamentado :(<br> puedes hacer todo el proceso para poder entrar... o estudia otra cosa :{D</h2>
        </head>
        <br><br>
        <form action="./index.php" method="POST">
        <input type="submit" value="Volver" name ="Volver">
        </form>
        ';
    }
?>
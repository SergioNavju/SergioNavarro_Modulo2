<?php
    include("./Config.php");
    $conexion= connectdb();
    session_start();
    if(isset($_POST["Salir"]))
    {
        $nCuenta=$_SESSION ["numCuenta"];
        $nCuenta=intval($nCuenta);
        $delete="DELETE FROM alumno WHERE Ncuenta = '$nCuenta'";
        $QUERYdelete= mysqli_query ($conexion, $delete);
        mysqli_fetch_array($QUERYdelete);
        session_unset();
        session_destroy();
        header("location:./index.php");
    }
    else
    {
        $nCuenta=$_SESSION ["numCuenta"];
        $nCuenta=intval($nCuenta);
        //Nombre
        $nombre=$_SESSION ["nombre"];
        $aPaterno=$_SESSION ["apePaterno"];
        $aMaterno=$_SESSION ["aMaterno"];
        
        //Promedios
        $pCuarto=$_SESSION ["promedio4"];
        $pQuinto=$_SESSION ["promedio5"];
        $pSexto=$_SESSION ["promedio6"];
        $pFinal=($pCuarto+$pQuinto+$pSexto)/3;

        //Area
        $area=$_SESSION ["area"];
        $carrera=$_SESSION ["carrera"];

        //Opcion
        $id_pase=$_SESSION ["ID_PASE"];
        
        //Probabilidad
        $proba=$_SESSION["Probabilidad"];

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
                    <legend><h2>Esta es su hoja de resultados con base a su base de datos proporcionados</h2></legend>
                    <table border="1" style="text-align: center">
                    <th colspan= "9">Datos Personales del alumno</th> 
                    <tr>
                        <td><b>N° de cuenta<b></td>
                        <td><b>Nombre<b></td>
                        <td><b>Apellido Paterno</b></td>
                        <td><b>Apellido Materno</b></td>
                        <td><b>Promedio Cuarto</b></td>
                        <td><b>Promedio Quinto</b></td>
                        <td><b>Promedio Sexto</b></td>
                        <td><b>Promedio final</b></td>
                        <td><b>Area</b></td>
                    </tr><tr>
                        <td>'. $nCuenta .'</td>
                        <td>'. $nombre .'</td>
                        <td>'. $aPaterno .'</td>
                        <td>'. $aMaterno .'</td>
                        <td>'. $pCuarto .'</td>
                        <td>'. $pQuinto .'</td>
                        <td>'. $pSexto .'</td>
                        <td>'. $pFinal .'</td>
                        <td>'. $area .'</td>
                    </tr>
                    </table>
                    <br><br>
            ';
            $SELECTCarrera="SELECT * FROM pase_regla INNER JOIN carrera ON pase_regla.clave_carrera=carrera.clave_carrera 
                            INNER JOIN modalidad ON pase_regla.id_modalidad=modalidad.id_modalidad 
                            INNER JOIN ubicacion ON pase_regla.id_ubicacion=ubicacion.id_ubicacion
                            WHERE id_pase ='$id_pase'";
            $QUERYCarrera= mysqli_query ($conexion, $SELECTCarrera);
            while ($ROWCarrera = mysqli_fetch_array($QUERYCarrera))
            {
                echo '
                <table border="1" style="text-align: center">
                    <th colspan= "4">Datos de la carrera solicitada</th> 
                    <tr>
                        <td><b>Carrera</b></td>
                        <td><b>Modalidad</b></td>
                        <td><b>Ubicación</b></td>
                        <td><b>Probabilidad de entrar</b></td>
                    </tr>
                    <tr>
                        <td>'.$ROWCarrera [6].'</td>
                        <td>'.$ROWCarrera [8].'</td>
                        <td>'.$ROWCarrera [10].'</td>
                        <td>'.$proba.'</td>
                    </tr>
                </table>
                </fieldset>
                <form action="Resultado.php" method="post"><br>
                <input type="submit" value="Eliminar Registro" name ="Salir">
                </form>
            </body>
            </html>
            ';
            }
    }
?>
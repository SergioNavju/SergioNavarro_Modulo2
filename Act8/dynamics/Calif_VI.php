<?php
    include("./Config.php");
    $conexion= connectdb();
    session_start();
    $area=$_SESSION ["area"];
    $area=intval($area);
    echo"<h2>Calificaciones de Sexto Año</h2>";
    $suma=0;
    $cont=0;
    if ((isset ($_POST["calif6"])))
    {
        foreach($_POST as $llave => $valor)
        {
            if($_POST[$llave]!="Continuar" && $_POST[$llave]!=$_POST["optas"])
            {
                $suma=$valor+$suma;
                $cont++;
            }
        }
        $promedio6=$suma/$cont;
        echo $promedio6;
        $_SESSION ["promedio6"] = $promedio6;
        header("location: ./logicinit.php");
    }
    else
    {
        //NO OPTATIVAS
        $Materias_SELECT = "SELECT Nombre from asignaturas WHERE (anio = '6') AND (Optativa = 'N') AND (Area = '$area' OR Area = '0')";
        $Materias_Query = mysqli_query ($conexion, $Materias_SELECT);
        while ($row = mysqli_fetch_array($Materias_Query))
        {
            echo'
                <form action="Calif_VI.php" method="post">
                    '.$row [0].'<br><input type="number" name='.$row [0].' min="5"  max="10" required><br>
                ';
            echo "<br>";
        }
        //Si optativas
        echo '
            Optativa:<br>
            <label for="optativa">
                <select name="optas">
            ';
        $Optas_SELECT = "SELECT Nombre from asignaturas WHERE (anio = '6') AND (Optativa = 'S') AND (Area = '$area' )";
        $Optas_Query = mysqli_query ($conexion, $Optas_SELECT);
        while ($row = mysqli_fetch_array($Optas_Query))
        {
            echo'<option value='. $row [0].'>'. $row [0].'</option>';
        }
        echo '</select><br><input type="number" name='.$row[0].' min="5"  max="10" required><br><br>';

        echo '<input type="submit" value="Continuar" name ="calif6">
        </form>';
    }
?>
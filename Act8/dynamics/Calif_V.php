<?php
    include("./Config.php");
    $conexion= connectdb();
    session_start();
    echo"<h2>Calificaciones de Quinto Año</h2>";
    $suma=0;
    $cont=0;
    if ((isset ($_POST["calif5"])))
    {
        foreach($_POST as $llave => $valor)
        {
            if($_POST[$llave]!="Continuar")
            {
                $suma=$valor+$suma;
                $cont++;
            }
        }
        $promedio5=$suma/$cont;
        echo $promedio5;
        $_SESSION ["promedio5"] = $promedio5;
        header("location: ./logicinit.php");
    }
    else
    {
        $Materias_SELECT = "SELECT Nombre from asignaturas WHERE anio = '5'";
        $Materias_Query = mysqli_query ($conexion, $Materias_SELECT);
        while ($row = mysqli_fetch_array($Materias_Query))
        {
            echo'
                <form action="Calif_V.php" method="post">
                '.$row[0].'<br><input type="number" name="'.$row[0].'" min="5"  max="10" required><br><br>';
        }
        echo '<input type="submit" value="Continuar" name ="calif5">
        </form>';
    }
?>
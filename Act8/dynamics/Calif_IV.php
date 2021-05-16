<?php
    include("./Config.php");
    $conexion= connectdb();
    session_start();
    echo"<h2>Calificaciones de Cuarto Año</h2>";
    $suma=0;
    $cont=0;
    if ((isset ($_POST["calif4"])))
    {
        foreach($_POST as $llave => $valor)
        {
            if($_POST[$llave]!="Continuar")
            {
                $suma=$valor+$suma;
                $cont++;
            }
        }
        $promedio4=$suma/$cont;
        echo $promedio4;
        $_SESSION ["promedio4"] = $promedio4;
        header("location: ./logicinit.php");
    }
    else
    {
        $Materias_SELECT = "SELECT Nombre from asignaturas WHERE anio = '4'";
        $Materias_Query = mysqli_query ($conexion, $Materias_SELECT);
        while ($row = mysqli_fetch_array($Materias_Query))
        {
            echo'
                <form action="Calif_IV.php" method="post">
                '.$row[0].'<br><input type="number" name="'.$row[0].'" min="5"  max="10" required><br><br>';
        }
        echo '<input type="submit" value="Continuar" name ="calif4">
        </form>';
    }
?>
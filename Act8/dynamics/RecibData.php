<?php
    include("./Config.php");
    $conexion= connectdb();
    session_start();
    $SQL_SELECT = "SELECT * from carrera";
    $SQL_Query = mysqli_query ($conexion, $SQL_SELECT);
    while ($row = mysqli_fetch_array($SQL_Query))
    {
        echo $row [0];
        echo "<br>";
        echo $row [1];
        echo "<br>";
        echo "<br>";
    }
?>
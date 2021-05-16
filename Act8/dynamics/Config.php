<?php
    function connectdb (){
        $conexion= mysqli_connect ("localhost","root","","Act8");
        if(!$conexion)
        {
            echo mysqli_connect_error();
            echo "ayuda aaaaa";
            echo mysqli_connect_errno();
            echo "<br> No se pudo acceder a la base de datos";
        }
        return $conexion;
    }
    connectdb ();
?>
<?php
    include("./Config.php");
    $conexion= connectdb();
    session_start();
    //Se inicializan las variables que nos llegan del formulario
    if ((isset ($_POST["numCuenta"])))
    {
        $_SESSION ["numCuenta"] = ($_POST["numCuenta"]);
        header("location: ./Registro.php");
    }
    else
    {
        //Si nunca ha iniciado sesion se pide que lo haga rellenando el formulario
        header ("location: ./index.php");
    }
    
    if ((isset ($_POST["Continuar"])))
    {
        $_SESSION ["nombre"] = ($_POST["nombre"]);
        $_SESSION ["apePaterno"] = ($_POST["apePaterno"]);
        $_SESSION ["aMaterno"] = ($_POST["apeMaterno"]);
        $_SESSION ["area"] = ($_POST["area"]);
        $_SESSION ["carrera"] = ($_POST["carrera"]);
        header("location: ./OpsCarrera.php");
    }
    elseif ((isset ($_POST["Eleccion"])) && (!isset ($_SESSION["promedio4"])))
    {
        $_SESSION ["ID_PASE"] = ($_POST["opcion"]);
        header("location: ./Calif_IV.php");
    }
    elseif ((isset($_SESSION ["promedio4"]))&& (!isset ($_SESSION["promedio5"])))
    {
        header("location: ./Calif_V.php");
    }
    elseif ((isset ($_SESSION ["promedio5"])) && (!isset ($_SESSION["promedio6"])))
    {
        header("location: ./Calif_VI.php");
    }
    
//REGISTRO DE USUARIO

    if ((isset ($_SESSION["promedio6"])))
    {
       //Datos personales del alumno
        //Numero de cuenta
        $nCuenta=$_SESSION ["numCuenta"];
        $nCuenta=intval($nCuenta);
        //Nombre
        $nombre=$_SESSION ["nombre"];
        $aPaterno=$_SESSION ["apePaterno"];
        $aMaterno=$_SESSION ["aMaterno"];
        
        //Promedios
        $pCuarto=$_SESSION ["promedio4"];
        $pCuarto=intval($pCuarto);
        $pQuinto=$_SESSION ["promedio5"];
        $pQuinto=intval($pQuinto);
        $pSexto=$_SESSION ["promedio6"];
        $pSexto=intval($pSexto);
        $pFinal=($pCuarto+$pQuinto+$pSexto)/3;

        //Area
        $area=$_SESSION ["area"];
        $area=intval($area);
        $carrera=$_SESSION ["carrera"];

        //Opcion
        $id_pase=$_SESSION ["ID_PASE"];
        $id_pase=intval($id_pase);
        //Probabilidades
        $SELECTCarrera="SELECT * FROM pase_regla INNER JOIN carrera ON pase_regla.clave_carrera=carrera.clave_carrera 
                        INNER JOIN modalidad ON pase_regla.id_modalidad=modalidad.id_modalidad 
                        INNER JOIN ubicacion ON pase_regla.id_ubicacion=ubicacion.id_ubicacion
                        WHERE id_pase ='$id_pase'";
         $QUERYCarrera= mysqli_query ($conexion, $SELECTCarrera);
         $ROWopcion = mysqli_fetch_array($QUERYCarrera);
        $probabilidad=$pFinal-$ROWopcion [4];
        if($probabilidad>0.5)
        {
            //Alta
            $probabilidad="Alta";
        }
        elseif($pFinal==$ROWopcion [4] || $probabilidad>0 && $probabilidad<0.5)
        {
            //Media
            $probabilidad="Media";
        }
        elseif($probabilidad<0 && $probabilidad>-0.5)
        {
            //Baja
            $probabilidad="Baja";
        }
        else
        {
            //Casi nula
            $probabilidad="Casi Nula"; 
        }
        $_SESSION["Probabilidad"]=$probabilidad;
        //Añadirlo a la base de datos
        $añadirUs="INSERT INTO alumno (Ncuenta,Promedio_cuarto,Promedio_quinto,Promedio_sexto,Nombre,ApellidoP,ApellidoM,Area,id_pase) 
                    VALUES ('$nCuenta','$pCuarto','$pQuinto','$pSexto','$nombre','$aPaterno','$aMaterno','$area','$id_pase')";
        $query=mysqli_query($conexion, $añadirUs);
        if($query)
        {
            echo "Se ha registrado correctamente";
            header("location: ./Resultado.php");
        }
        else
        {
            echo "No se pudo registrar correctamente";
        }
    }
?>
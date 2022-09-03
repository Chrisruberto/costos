<?php

include("conexion.php");
$con=conectar();
$orden=$_POST['orden'];
$ingrediente=$_POST['ingrediente'];
$precio_u=$_POST['precio_u'];
$precio_a=$_POST['precio_a'];
$cantidad=$_POST['cantidad'];


$sql="UPDATE producto SET  ingrediente='$ingrediente',precio_u='$precio_u',precio_a='$precio_a',cantidad='$cantidad'
 WHERE orden='$orden'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: costos.php");
    }
?>
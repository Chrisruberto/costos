<?php

include("conexion.php");
$con=conectar();

$orden=$_GET['id'];

$sql="DELETE FROM producto  WHERE orden='$orden'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: costos.php");
    }
?>

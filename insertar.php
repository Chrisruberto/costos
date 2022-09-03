<?php
include("conexion.php");
$con=conectar();

$orden=$_POST['orden'];
$ingrediente=$_POST['ingrediente'];
$precio_u=$_POST['precio_u'];
$precio_a=$_POST['precio_a'];
$cantidad=$_POST['cantidad'];



$sql="INSERT INTO producto VALUES('$orden','$ingrediente','$precio_u','$precio_a','$cantidad')";
$query= mysqli_query($con,$sql);  // que realice la consulta 

if($query){
    Header("Location: costos.php");
    
}else {
}
?>
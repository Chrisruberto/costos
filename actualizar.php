<?php 
    include("conexion.php");
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM producto WHERE orden='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="orden" value="<?php echo $row['orden']  ?>">
                                <input type="text" class="form-control mb-3" name="ingrediente" placeholder="ingrediente" value="<?php echo $row['ingrediente']  ?>">
                                <input type="number" class="form-control mb-3" name="precio_u" placeholder="precio_u" value="<?php echo $row['precio_u']  ?>">
                                <input type="number" class="form-control mb-3" name="precio_a" placeholder="precio_a" value="<?php echo $row['precio_a']  ?>">
                                <input type="number" class="form-control mb-3" name="cantidad" placeholder="cantidad" value="<?php echo $row['cantidad']  ?>">
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>
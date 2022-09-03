<?php 
    include("conexion.php");
    $con=conectar(); //ya que la coneccion conectar retorna con, conectar llama a con.

 

    $num_por_pag=10;


	if(isset($_GET["page"]))
	{
		$page=$_GET["page"];
	}
	else
	{
		$page=1;
	}

	$start_from=($page-1)*10;

	$sql="select * from producto limit $start_from,$num_por_pag";
	$query=mysqli_query($con,$sql);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> COSTOS</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://kit.fontawesome.com/805c7bb8e3.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        

    </head>
    <body>

            <div class="container mt-4">
                    <div class="row"> 
                         
                    <!-- Formulario para cargar datos -->
                        <div class="col-md-3"> 
                            <h1>Ingrese datos</h1>
                                <form action="insertar.php" method="POST">
                                    <input type="number" class="form-control mb-3" name="orden" placeholder="Orden">  
                                    <input type="text" class="form-control mb-3" name="ingrediente" placeholder="Ingrediente">
                                    <input type="number" step="any" class="form-control mb-3" name="precio_u" placeholder="Precio Unitario">
                                    <input type="number" step="any" class="form-control mb-3" name="precio_a" placeholder="Precio Actualizados">
                                    <input type="number" step="any" class="form-control mb-3" name="cantidad" placeholder="Cantidad">
                                    <input type="submit" class="btn btn-primary">
                                </form> <br> 
                        </div> 
                        <!---------- Listado de alumnos  --------->
                        <div class="col-md-10">
                            
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>Orden</th>
                                        <th>Ingredientes</th>
                                        <th>Precio Unitarios</th>
                                        <th>Precio Actualizado</th>
                                        <th>Cantidad Utilizada</th>
                                        <th>Costo</th>
                                          </tr>
                                         
                                </thead>

                                <tbody>
                                <?php
                                            while($row=mysqli_fetch_array($query)){
                                                // consulta para que agrege por orden primero cod estudiante despues dni todo ordenado.
                                        ?>
                                                                                    <tr>
                                                <th><?php  echo $row['orden']?></th> 
                                                <th><?php  echo $row['ingrediente']?></th>
                                                <th><?php  echo $row['precio_u']?></th>
                                                <th><?php  echo $row['precio_a']?></th>
                                                <th><?php  echo $row['cantidad']?></th>
                                                <th id="costo"><?php  
                                                    
                                                     $var1 =  $row['precio_u'] ;
                                                     $var2 = $row['precio_a'];
                                                     $var3 = ['ingrediente'];
                                                     $var3 = 100;
                                                     $costo = $var1 * $var2 / $var3;
                                                
                                                echo $costo ?></th> 
                                                                       <!---------- Botones para eliminar / editar datos  --------->

                                                <th><a href="actualizar.php?id=<?php echo $row['orden'] ?>" class="btn btn-info">Editar</a></th> 
                                                <th><a href="delete.php?id=<?php echo $row['orden'] ?>" class="btn btn-danger">Eliminar</a></th>                                        
                                            
                                            </tr>
                                                                                    <?php
                                             }
                                     ?>
                                     
                            <th >Costo Total $
                            </th> 
                            <th >Ganancia $
                            </th> 
                             <br>
                            <th>Precio final  $</th> <br>
                            </tr> <br>           
                                </tbody>
                            </table>


             <?php  
             
$sql="select * from producto";
$query=mysqli_query($con,$sql);
$total_records=mysqli_num_rows($query);
$total_pages=ceil($total_records/$num_por_pag);

for($i=1;$i<=$total_pages;$i++)
{

    
    echo "<a href='costos.php?page=".$i."' class='btn btn-primary'>$i</a>";
}
        ?>                
            


         </div>
                                         
      </div>  
 </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
          crossorigin="anonymous"></script>
        <script src="js/app.js"></script>
    </body>
</html> 
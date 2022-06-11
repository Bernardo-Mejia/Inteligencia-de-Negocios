<?php 
    include("conexion.php");
    session_start();
    if(!isset($_SESSION['id'])){
		header("Location: ../index.php");
	}

    $con=conectar();

    $nombre = $_SESSION['nombre'];
	$tipo_usuario = $_SESSION['tipo_usuario'];
    $idUsuario = $_SESSION['idUsuario'];

    $id=$_GET['id'];

    $sql="SELECT * FROM ingresos WHERE idIngreso='$id'";
    $query=mysqli_query($con,$sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Actualizar Ingreso</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="./style/estilos_categoria.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="idIngreso" value="<?php echo $row['idIngreso']  ?>">
                                
                                <input type="text" class="form-control mb-3" name="Ingreso" placeholder="Valor del ingreso" value="<?php echo $row['Ingreso']  ?>">
                                <input type="text" class="form-control mb-3" name="Fecha" placeholder="Nueva Fecha" value="<?php echo $row['Fecha']  ?>">
                                <input type="text" class="form-control mb-3" name="Hora" placeholder="Nueva Hora" value="<?php echo $row['Hora']  ?>">
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    <a href="./index.php"><button class="btn btn-primary return">Regresar</button></a>
                    
                </div>
    </body>
</html>
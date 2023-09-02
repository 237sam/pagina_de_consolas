<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <?php 
        include("menu/admin.html");
        include("logica/database.php");
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h3>Modificar consola</h3>
                <?php
                    $consolas = new Database();
                    if(isset($_GET["id"]) && !empty($_GET["id"])){
                        $id = $consolas->sanitize($_GET["id"]);
                        $res = $consolas->buscarConsola($id);
                        if($res){
                ?>
                        <form action="logica/proceso_modificar_consola.php" method="POST">
                            <div class="form-group">
                                <label for="id">ID Juego</label>
                                <input id="id" name="id" type="text" value="<?php echo $res->id; ?>" required="required" readonly="" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input id="nombre" name="nombre" type="text" value="<?php echo $res->nombre; ?>" class="form-control" required="required" >
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha de lanzamiento:</label>
                                <input id="fecha" name="fecha" type="date" value="<?php echo $res->fechalan; ?>" class="form-control" required="required" >
                            </div>
                            <div class="form-group">
                                <label for="marca">Marca:</label>
                                <input id="marca" name="marca" type="text" value="<?php echo $res->marca; ?>" class="form-control" required="required" >
                            </div>
                            <div class="form-group">
                                <button name="submit" type="submit" class="btn btn-primary">Modificar</button>
                            </div>
                        </form>
                <?php
                        } else {
                            echo "<div class='alert alert-danger'>consola no encontrado</div>";
                        }
                    }
                    ?>
            </div>
        </div>
    </div>
</body>

</html>
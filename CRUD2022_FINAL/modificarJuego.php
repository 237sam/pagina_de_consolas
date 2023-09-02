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
                <h3>Modificar Juego</h3>
                <?php
                    $juegos = new Database();
                    if(isset($_GET["id"]) && !empty($_GET["id"])){
                        $id = $juegos->sanitize($_GET["id"]);
                        $res = $juegos->buscarJuego($id);
                        if($res){
                ?>
                        <form action="logica/proceso_modificar.php" method="POST">
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
                                <input id="fecha" name="fecha" type="date" value="<?php echo $res->fechalanzamiento; ?>" class="form-control" required="required" >
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea id="descripcion" name="descripcion" cols="40" rows="3" class="form-control" required="required"><?php echo $res->descripcion; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="consola">Consola:</label>
                                <div>
                                    <select id="consola" name="consola" class="custom-select" required="required">
                                    <?php
                                    $consolas = new Database();
                                    $res2 = $consolas->mostrarConsolas();
                                    if(!$res2){
                                        ?>
                                        <option>Consolas no encontradas</option>
                                        <?php
                                    }else{
                                        while($row = mysqli_fetch_object($res2)){
                                            if($row->id == $res->consola){
                                            ?>
                                            <option value="<?php echo $row->id; ?>" selected=""><?php echo $row->nombre; ?></option>
                                            <?php
                                            }else{
                                                ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->nombre; ?></option>
                                                <?php
                                            }
                                    }
                                    }
                                ?> 
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button name="submit" type="submit" class="btn btn-primary">Modificar</button>
                            </div>
                        </form>
                <?php
                        } else {
                            echo "<div class='alert alert-danger'>Juego no encontrado</div>";
                        }
                    }
                    ?>
            </div>
        </div>
    </div>
</body>

</html>
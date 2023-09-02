<?php
    include("database.php");
    $juegos = new Database();
    if(isset($_POST) && !empty($_POST)){
        $id = $juegos->sanitize($_POST['id']);
        $nombre = $juegos->sanitize($_POST['nombre']);
        $fechalanzamiento = $juegos->sanitize($_POST['fecha']);
        $descripcion = $juegos->sanitize($_POST['descripcion']);
        $consola = $juegos->sanitize($_POST['consola']);

        $res = $juegos->insertarJuego($id, $nombre, $fechalanzamiento, $descripcion, $consola);
        if($res){
            header("Location: ../mostrarJuegos.php?msg=1");
        }else{
            header("Location: ../mostrarJuegos.php?msg=4");
        }
    }
?>
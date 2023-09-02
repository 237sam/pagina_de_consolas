<?php
    include("database.php");
    $consolas = new Database();
    if(isset($_POST) && !empty($_POST)){
        $id = $consolas->sanitize($_POST['id']);
        $nombre = $consolas->sanitize($_POST['nombre']);
        $fechalan = $consolas->sanitize($_POST['fecha']);
        $marca = $consolas->sanitize($_POST['marca']);

        $res = $consolas->insertarConsola($id, $nombre, $fechalan, $marca);
        if($res){
            header("Location: ../mostrarConsolas.php?msg=1");
        }else{
            header("Location: ../mostrarConsolas.php?msg=4");
        }
    }
?>
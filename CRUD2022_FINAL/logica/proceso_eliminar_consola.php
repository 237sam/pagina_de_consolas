<?php
    include("database.php");
    $consolas = new Database();
    if(isset($_GET["id"]) && !empty($_GET["id"])){
        $id = $consolas->sanitize($_GET["id"]);
        $res = $consolas->eliminarConsola($id);
        if(res){
            header("Location: ../mostrarConsolas.php?msg=3");
        }else{
            header("Location: ../mostrarConsolas.php?msg=6");
        }
    }
?>
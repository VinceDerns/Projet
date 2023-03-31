<?php

if (isset($_POST['title'])) {
require '../CRUD/bd_conn.php';

    $titre = $_POST['title'];

    if(empty($titre)) {
        header("Location:../CRUD/index.php?mess=error");
    } else {
        $stmt = $conn -> prepare("INSERT INTO todo(titre) VALUE (?)");
        $res = $stmt -> execute([$titre]);

        if ($res) {
            header("Location: ../CRUD/index.php?mess=success");
        } else {
            header("Location: ../CRUD/index.php");
        }
        $conn = null;
        exit();
    }
} else {
    
    header("Location:../CRUD/index.php?mess=error");
}





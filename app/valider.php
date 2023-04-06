<?php

if (isset($_POST['id'])) {
require '../CRUD/bd_conn.php';

    $id = $_POST['id'];

    if(empty($id)) {
        echo 'error';
    } else {
        $add_todo = $conn -> prepare("SELECT id, valider FROM add_todo WHERE id=?");
        $add_todo -> execute([$id]);
        $todo = $add_todo->fetch();
        $uId = $todo['id'];
        $valider = $todo['valider'];
        $uValider = $valider ? 0 : 1;
        $res = $conn->query("UPDATE add_todo SET valider=$uValider WHERE id=$uId");

        if ($res) {
            echo  $valider;
        } else {
            echo "erreur";
        }
        $conn = null;
        exit();
    }
} else {
    
    header("Location:../CRUD/index.php?mess=error");
}
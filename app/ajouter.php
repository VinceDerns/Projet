<?php

if (isset($_POST['title'])) {
require '../CRUD/bd_conn.php';

    $titre = $_POST['title'];

    if(empty($titre)) {
        header("Location:../CRUD/index.php?mess=error");
    }
}




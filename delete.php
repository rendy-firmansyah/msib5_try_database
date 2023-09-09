<?php

    include_once("connection.php");

    $id = $_GET['id'];
    $result_remove = mysqli_query($mysqli, "DELETE FROM mahasiswas WHERE id='$id'");
    header("Location:create.php#tabelNilai");
?>
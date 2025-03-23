<?php

require_once __DIR__ . "/../config/database.php";

$id = $_GET['id'];

$FilmDeleteQuery = "DELETE FROM film WHERE id= '$id' ";

if(mysqli_query($conn, $FilmDeleteQuery))
{
    header("Location: ../pages/stock.php?status=success");
}else{
    header("Location: ../pages/stock.php?status=error");
}

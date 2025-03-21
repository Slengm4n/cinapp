<?php

require_once __DIR__ . "/../config/database.php";

$id = $_GET['id'];

$FilmDeleteQuery = "DELETE FROM film WHERE id=?";
$stmt = $pdo->prepare($FilmDeleteQuery);
$stmt->execute([$id]);

$stmt->close();

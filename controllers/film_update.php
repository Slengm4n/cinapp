<?php

require_once __DIR__ . '/../config/database.php';

$id = $_POST['id'];
$title = $_POST['title'];
$synopsis = $_POST['synopsis'];
$release_date = $_POST['release_date'];
$duration = $_POST['duration'];
$genre = $_POST['genre'];
$country = $_POST['country'];
$direction = $_POST['direction'];
$distributor = $_POST['distributor'];

if (!empty($id) && !empty($title)) {
    try {
        $stmt = $pdo->prepare("UPDATE film SET title = :title, synopsis = :synopsis, release_date = :release_date, duration = :duration, genre = :genre, country = :country, direction = :direction, distributor = :distributor WHERE id = :id");

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':synopsis', $synopsis, PDO::PARAM_STR);
        $stmt->bindParam(':release_date', $release_date, PDO::PARAM_STR);
        $stmt->bindParam(':duration', $duration, PDO::PARAM_INT);
        $stmt->bindParam(':genre', $genre, PDO::PARAM_STR);
        $stmt->bindParam(':country', $country, PDO::PARAM_STR);
        $stmt->bindParam(':direction', $direction, PDO::PARAM_STR);
        $stmt->bindParam(':distributor', $distributor, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Filme atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar filme.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "ID e título são obrigatórios!";
}

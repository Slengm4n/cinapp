<?php
require_once __DIR__ . '/../config/database.php';

header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM film WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $film = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($film) {
            echo json_encode($film);
        } else {
            echo json_encode(['error' => 'Filme não encontrado']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'ID não fornecido']);
}
?>

<?php
require_once __DIR__ . '/../config/database.php';

header('Content-Type: application/json');

// Permitir apenas requisições GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido']);
    exit;
}

if (!isset($_GET['id'])) {
    http_response_code(400);
    echo json_encode(['error' => 'ID não fornecido']);
    exit;
}

$id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

try {
    $stmt = $pdo->prepare("SELECT * FROM film WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    $film = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($film) {
        echo json_encode($film);
    } else {
        http_response_code(404);
        echo json_encode(['error' => 'Filme não encontrado']);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro no banco de dados: ' . $e->getMessage()]);
}
?>

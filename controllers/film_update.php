<?php
require_once __DIR__ . '/../config/database.php';

// Verifica se a requisição é POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido']);
    exit;
}

// Validação básica dos dados
$requiredFields = ['id', 'title'];
foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        http_response_code(400);
        echo json_encode(['error' => "O campo $field é obrigatório"]);
        exit;
    }
}

// Sanitização dos dados
$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
$synopsis = filter_var($_POST['synopsis'] ?? '', FILTER_SANITIZE_STRING);
$release_date = filter_var($_POST['release_date'] ?? '', FILTER_SANITIZE_STRING);
$duration = filter_var($_POST['duration'] ?? 0, FILTER_SANITIZE_NUMBER_INT);
$genre = filter_var($_POST['genre'] ?? '', FILTER_SANITIZE_STRING);
$country = filter_var($_POST['country'] ?? '', FILTER_SANITIZE_STRING);
$direction = filter_var($_POST['direction'] ?? '', FILTER_SANITIZE_STRING);
$distributor = filter_var($_POST['distributor'] ?? '', FILTER_SANITIZE_STRING);

try {
    $stmt = $pdo->prepare("UPDATE film SET 
        title = :title, 
        synopsis = :synopsis, 
        release_date = :release_date, 
        duration = :duration, 
        genre = :genre, 
        country = :country, 
        direction = :direction, 
        distributor = :distributor 
        WHERE id = :id");

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
        echo json_encode(['success' => 'Filme atualizado com sucesso!']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Erro ao atualizar filme']);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro no banco de dados: ' . $e->getMessage()]);
}
?>

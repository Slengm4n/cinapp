<?php
require_once __DIR__ . '/../config/database.php';

// Obter a conexão PDO
$pdo = require __DIR__ . '/../config/database.php';

try {
    // Consulta usando PDO
    $FilmQuery = "SELECT * FROM film";
    $stmt = $pdo->query($FilmQuery);
    $films = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro na consulta: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes cadastrados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            position: sticky;
            top: 0;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            color: #0066cc;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Filmes Cadastrados</h1>
    
    <?php if (count($films) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Nome do filme</th>
                    <th>Sinópse</th>
                    <th>Duração (min)</th>
                    <th>Data de lançamento</th>
                    <th>País de origem</th>
                    <th>Direção</th>
                    <th>Distribuidora</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($films as $film): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($film['title']); ?></td>
                        <td><?php echo htmlspecialchars($film['synopsis']); ?></td>
                        <td><?php echo htmlspecialchars($film['duration']); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($film['release_date'])); ?></td>
                        <td><?php echo htmlspecialchars($film['country']); ?></td>
                        <td><?php echo htmlspecialchars($film['direction']); ?></td>
                        <td><?php echo htmlspecialchars($film['distributor']); ?></td>
                        <td>
                            <a href="../controllers/film_update.php?id=<?php echo intval($film['id']); ?>" title="Editar">✏️</a>
                            <a href="../controllers/film_delete.php?id=<?php echo intval($film['id']); ?>" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir este filme?')">❌</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum filme cadastrado.</p>
    <?php endif; ?>
</body>

</html>

<?php
require_once __DIR__ . '/../config/database.php';

$FilmQuery = "SELECT * FROM film";
$FilmQueryResult = mysqli_query($conn, $FilmQuery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes cadastrados</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Nome do filme</th>
                <th>Sinópse</th>
                <th>Duração</th>
                <th>Data de lançamento</th>
                <th>País de origem</th>
                <th>Direção</th>
                <th>Distribuídora</th>
                <th>Atulizar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data = mysqli_fetch_array($FilmQueryResult)): ?>
                <td><?php echo $data['title']; ?></td>
                <td><?php echo $data['synopsis']; ?></td>
                <td><?php echo $data['duration']; ?></td>
                <td><?php echo $data['release_date']; ?></td>
                <td><?php echo $data['country']; ?></td>
                <td><?php echo $data['direction']; ?></td>
                <td><?php echo $data['distributor']; ?></td>
                <td>
                    <a href="../controllers/film_update.php?id=<?php echo $data['id']; ?>"></a>
                </td>
                <td>
                    <a href="../controllers/film_delete.php?id=<?php echo $data['id']; ?>">Deletar</a>
                </td>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>
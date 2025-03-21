<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de filmes</title>
</head>
<body>
    <form action="../controllers/film_create.php" method="POST">
        <label for="title">Título:</label>
        <input id="title" name="title" type="text"></input>
        <br>
        <label for="synopsis">Sinópse:</label>
        <input id="synopsis" name="synopsis" type="text">
        <br>
        <label for="release_date">Data de lançamento:</label>
        <input id="release_date" name="release_date" type="date">
        <br>
        <label for="duration">Duração:</label>
        <input id="duration" name="duration" type="number">
        <br>
        <label for="genre">Genêro:</label>
        <input id="genre" name="genre" type="text">
        <br>
        <label for="direction">Direção:</label>
        <input id="direction" name="direction" type="text">
        <br>
        <label for="country">País de origem:</label>
        <input id="country" name="country" type="text">
        <br>    
        <label for="distributor">Distribuição:</label>
        <input id="distributor" name="distributor" type="text">
        <br>
        <input type="submit">
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Filme</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 600px; margin: 0 auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, textarea, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <h1>Atualizar Filme</h1>
    <form action="update_film.php" method="post">
        <div class="form-group">
            <label for="id">ID do Filme:</label>
            <input type="number" id="id" name="id" required>
        </div>

        <div class="form-group">
            <label for="title">Título:</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="synopsis">Sinopse:</label>
            <textarea id="synopsis" name="synopsis" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="release_date">Data de Lançamento:</label>
            <input type="date" id="release_date" name="release_date">
        </div>

        <div class="form-group">
            <label for="duration">Duração (minutos):</label>
            <input type="number" id="duration" name="duration">
        </div>

        <div class="form-group">
            <label for="genre">Gênero:</label>
            <select id="genre" name="genre">
                <option value="Ação">Ação</option>
                <option value="Aventura">Aventura</option>
                <option value="Comédia">Comédia</option>
                <option value="Drama">Drama</option>
                <option value="Ficção Científica">Ficção Científica</option>
                <option value="Terror">Terror</option>
                <option value="Romance">Romance</option>
                <option value="Animação">Animação</option>
                <option value="Documentário">Documentário</option>
            </select>
        </div>

        <div class="form-group">
            <label for="country">País:</label>
            <input type="text" id="country" name="country">
        </div>

        <div class="form-group">
            <label for="direction">Direção:</label>
            <input type="text" id="direction" name="direction">
        </div>

        <div class="form-group">
            <label for="distributor">Distribuidora:</label>
            <input type="text" id="distributor" name="distributor">
        </div>

        <button type="submit">Atualizar Filme</button>
    </form>

    <script>
        // Opcional: Carregar dados do filme quando o ID é informado
        document.getElementById('id').addEventListener('change', function() {
            const filmId = this.value;
            if (filmId) {
                fetch(`get_film.php?id=${filmId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data) {
                            document.getElementById('title').value = data.title || '';
                            document.getElementById('synopsis').value = data.synopsis || '';
                            document.getElementById('release_date').value = data.release_date || '';
                            document.getElementById('duration').value = data.duration || '';
                            document.getElementById('genre').value = data.genre || '';
                            document.getElementById('country').value = data.country || '';
                            document.getElementById('direction').value = data.direction || '';
                            document.getElementById('distributor').value = data.distributor || '';
                        }
                    })
                    .catch(error => console.error('Erro ao carregar filme:', error));
            }
        });
    </script>
</body>
</html>

<?php 

require_once __DIR__ . '/../config/database.php';

$title = $_POST['title'];
$synopsis = $_POST['synopsis'];
$release_date = $_POST['release_date'];
$duration = $_POST['duration'];
$genre = $_POST['genre'];
$country = $_POST['country'];
$direction = $_POST['direction'];
$distributor = $_POST['distributor'];

$stmt = $conn->prepare("INSERT INTO film (title, synopsis, release_date, duration, genre, country, direction, distributor) VALUES(?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssss", $title, $synopsis, $releasse_date, $duration, $genre, $country, $direction, $distributor);

if($stmt->execute()){
    echo "Filme cadastrado com sucesso!";
}else{
    echo "Erro ao cadastrar o filme" . $stmt->error;
}

$stmt->close();
$conn->close();






    


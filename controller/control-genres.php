<?php
include('model/model-pdo.php');
include('model/model-genres.php');
include('model/model-artistes.php');
include('model/model-styles.php');

include('view/view-genres-head.php');
$styles = new Style($pdo);


$genres = new Genre($pdo);
$genreTous = $genres->lireTous();

$artistes = new Artiste($pdo);

if (isset($_POST['creer-genre'])){
    include('view/view-creer-genre.php');
} elseif (isset($_POST['confirme-creer-genre'])){
    $genres->creer($_POST['genre-name']);
    echo("<div class='modif-nom-genre'><p>Genre créé
            <a href='?genres'>OK</a></p></div>");
} elseif (isset($_POST['modif-nom-genre'])){
    $nom = $_POST['genre-name'];
    $id = $_POST['genre-id'];
    include('view/view-modif-genre.php');
} elseif (isset($_POST['valider-nom'])){
    $genres->modifNom($_POST['nom'], $_POST['id']);
    echo("<div class='modif-nom-genre'><p>Nom modifié
            <a href='?genres'>OK</a></p></div>");
} elseif (isset($_POST['suppr-genre'])){
    $id = $_POST['genre_id'];
    $nom = $_POST['genre_name'];
    include('view/view-suppr-genre.php');
} elseif (isset($_POST['confirme-suppr-genre'])){
    $genres->supprimer($_POST['genre-id']);
    echo("<div class='modif-nom-genre'><p>Genre supprimé
        <a href='?genres'>OK</a></p></div>");
    }
   
include('view/view-genres.php');
?>
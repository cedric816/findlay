<?php
include('model/model-pdo.php');
include('model/model-styles.php');
include('model/model-genres.php');

include('view/view-styles-head.php');

$styles = new Style($pdo);
$stylesTous = $styles->lireTous();

$genres = new Genre($pdo);
$genreTous = $genres->lireTous();

if (isset($_POST['creer-style'])){
    include('view/view-creer-style.php');
} elseif (isset($_POST['confirme-creer-style'])){
    $styles->creer($_POST['style-name'], $_POST['genre-id']);
    echo("<div class='modif-nom-style'><p>Style créé
            <a href='?styles'>OK</a></p></div>");
} elseif (isset($_POST['modif-nom-style'])){
    $id = $_POST['style-id'];
    $nom = $_POST['style-name'];
    include('view/view-modif-style.php');
} elseif (isset($_POST['valider-nom'])){
    $styles->modifier($_POST['nom'], $_POST['id']);
    echo("<div class='modif-nom-style'><p>Nom modifié
            <a href='?styles'>OK</a></p></div>");
} elseif (isset($_POST['suppr-style'])){
    $id = $_POST['style_id'];
    $nom = $_POST['style_name'];
    include('view/view-suppr-style.php');
} elseif (isset($_POST['confirme-suppr-style'])){
    $styles->supprime($_POST['style-id']);
    echo("<div class='modif-nom-style'><p>Style supprimé
            <a href='?styles'>OK</a></p></div>");
}

include('view/view-styles.php');
?>
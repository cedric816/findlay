<?php
//on prend les infos pour la connexion à la BDD
include('model/model-pdo.php');
//on prend la class Artiste avec tous les outils nécessaires pour récupérer les bonnes infos
include('model/model-artistes.php');
//on instancie un nouvel objet artistes et on commence par récupérer les infos de tous les artistes
$artistes = new Artiste($pdo);
$infosArtistes=$artistes->lireTous();
//on prend le début de la vue c à d le head avec la bonne feuille de style
include('view/view-artistes-head.php');
// ici commence les test successifs pour déterminer l'action de l'utilisateur et y répondre
if (isset($_POST['modif-nom-artist'])){
    $id = $_POST['artist_id'];
    $name = $_POST['artist_name'];
    include('view/view-modif-artiste.php');
} elseif (isset($_POST['valider-nom'])){
    $artistes->modifierNom($_POST['id'], $_POST['nom']);
    echo("<div class='modif-nom-artiste'><p>Nom changé
    <a href='?artistes'>OK</a></p></div>");
} elseif (isset($_POST['suppr-artist'])){
    $id = $_POST['artist_id'];
    $name = $_POST['artist_name'];
    include('view/view-suppr-artiste.php');
} elseif (isset($_POST['confirme-suppr-artiste'])){
    $artistes->supprimer($_POST['artist-id']);
    echo("<div class='modif-nom-artiste'><p>Artiste supprimé
    <a href='?artistes'>OK</a></p></div>");
} elseif (isset($_POST['creer-artiste'])){
    include('view/view-creer-artiste.php');
} elseif (isset($_POST['confirme-creer-artiste'])){
    $nom = $_POST['artist_name'];
    $artistes->creer($nom);
    echo("<div class='modif-nom-artiste'><p>Artiste créé
    <a href='?artistes'>OK</a></p></div>");
} elseif (isset($_POST['ajout-style-artist'])){
    $id = $_POST['artist_id'];
    $nom = $_POST['artist_name'];
    include('view/view-ajout-style-artiste.php');
} elseif (isset($_POST['confirme-ajouter-style'])){
    $artistes-> ajouterStyle($_POST['artist-id'], $_POST['style-id']);
    echo("<div class='modif-nom-artiste'><p>Style ajouté
    <a href='?artistes'>OK</a></p></div>");
} elseif (isset($_POST['suppr-style-artist'])){
    $id = $_POST['artist_id'];
    $nom = $_POST['artist_name'];
    include('view/view-suppr-style-artiste.php');
} elseif (isset($_POST['confirme-suppr-style'])){
    $artistes->supprStyle($_POST['artist-id'], $_POST['style-id']);
    echo("<div class='modif-nom-artiste'><p>Style supprimé
    <a href='?artistes'>OK</a></p></div>");
}
//enfin on prend la vue des artistes
include('view/view-artistes.php');
?>
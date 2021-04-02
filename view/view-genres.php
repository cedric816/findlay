<header>
    <form method="post">
        <input type="submit" name="creer-genre" value="Nouveau genre">
    </form>
    <h1>Liste de tous les genres</h1>
    <div class="menu">
        <a href="?artistes"><button class='btn-menu'>Artistes</button></a>
        <a href="?styles"><button class='btn-menu'>Styles</button></a>
        <a href="?"><img src="ressources/door.png" alt="icone de retour à l'accueil" height="100px"></a>
    </div>
</header>
<!--on liste tous les genres et leurs styles associés-->
<main>
<?php
while($genre = $genreTous->fetch()){
    $id = $genre['genre_id'];
    $nom = $genre['genre_name'];
    $stylesParGenre = $genres->lireStylesParGenre($id);
    echo("  <div class='fiche-genre'>
                <div class='nom-genre'>
                    <h3>".htmlentities($nom, ENT_QUOTES)."</h3>
                    <div class='gestion-genre'>
                    <form method='post' action=''>
                        <input type='hidden' name='genre-id' value=".$id.">
                        <input type='hidden' name='genre-name' value='".htmlentities($nom, ENT_QUOTES)."'>
                        <input type='submit' name='modif-nom-genre' value='Modifier nom'>
                    </form>
                    <form method='post' action=''>
                        <input type='hidden' name='genre_id' value=".$id.">
                        <input type='hidden' name='genre_name' value='".htmlentities($nom, ENT_QUOTES)."'>
                        <input class='delete' type='submit' name='suppr-genre' value='X'>
                    </form>
                    </div>
                </div>
                <h4>Styles associés:</h4>
                <ul class='styles-associes'>");
                    while($style = $stylesParGenre->fetch()){
                        echo("<li> " .htmlentities($style['style_name'], ENT_QUOTES)." -  </li> ");
                    } 
    echo("      </ul>
            </div>");
}
?>
</main>
<footer>
    <p>@Cameron Findlay</p>
</footer>
<?php
include('view/view-generale-fin.php');
?>
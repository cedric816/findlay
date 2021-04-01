
<header>
    <h1>Liste de tous les artistes et leurs styles</h1>
    <form method="post">
        <input type="submit" name="creer-artiste" value="Nouvel artiste">
    </form>
    <a href="?"><img src="ressources/door.png" alt="icone de retour à l'accueil" height="100px"></a>
</header>
<main>
<?php
while($info = $infosArtistes->fetch()){
    $id = $info['artist_id'];
    $stylesArtiste = $artistes->lireStyles($id);
    echo("  <div class='fiche-artiste'>
                <div class='nom-artiste'>
                    <h3>".htmlentities($info['artist_name'], ENT_QUOTES)."</h3>
                    <div class='gestion-artiste'>
                    <form method='post' action=''>
                        <input type='hidden' name='artist_id' value=".$info['artist_id'].">
                        <input type='hidden' name='artist_name' value='".htmlentities($info['artist_name'], ENT_QUOTES)."'>
                        <input type='submit' name='modif-nom-artist' value='Modifier nom'>
                    </form>
                    <form method='post' action=''>
                        <input type='hidden' name='artist_id' value=".$info['artist_id'].">
                        <input type='hidden' name='artist_name' value='".htmlentities($info['artist_name'], ENT_QUOTES)."'>
                        <input class='delete' type='submit' name='suppr-artist' value='X'>
                    </form>
                    </div>
                </div>
                <h4>Styles musicaux:</h4>
                <ul class='styles-artiste'>");
                    while($style = $stylesArtiste->fetch()){
                        echo("<li> ".htmlentities($style['style_name'], ENT_QUOTES)."</li>");
                    } 
                    echo("<li>
                    <form method='post'>
                        <input type='hidden' name='artist_id' value=".$info['artist_id'].">
                        <input type='hidden' name='artist_name' value='".htmlentities($info['artist_name'], ENT_QUOTES)."'>
                        <input type='submit' name='ajout-style-artist' value='Plus de style...'>
                    </form></li>");
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
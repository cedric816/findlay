<header>
    <h1>Liste de tous les styles</h1>
    <form method="post">
        <input type="submit" name="creer-style" value="Nouveau style">
    </form>
    <a href="?"><img src="ressources/door.png" alt="icone de retour à l'accueil" height="100px"></a>
</header>
<main>
    <div class="sommaire">
        <a href="#A">A</a>
        <a href="#B">B</a>
        <a href="#C">C</a>
        <a href="#D">D</a>
        <a href="#E">E</a>
        <a href="#F">F</a>
        <a href="#G">G</a>
        <a href="#H">H</a>
        <a href="#I">I</a>
        <a href="#J">J</a>
        <a href="#K">K</a>
        <a href="#L">L</a>
        <a href="#M">M</a>
        <a href="#N">N</a>
        <a href="#O">O</a>
        <a href="#P">P</a>
        <a href="#Q">Q</a>
        <a href="#R">R</a>
        <a href="#S">S</a>
        <a href="#T">T</a>
        <a href="#U">U</a>
        <a href="#V">V</a>
        <a href="#W">W</a>
        <a href="#X">X</a>
        <a href="#Y">Y</a>
        <a href="#Z">Z</a>
    </div>
    <?php
    $lettreEnCours = 'A';
    echo("<div class='alphabet'>".$lettreEnCours."</div>");
    while($style = $stylesTous->fetch()){
        if (strtoupper(substr($style['style_name'], 0, 1))==$lettreEnCours){
            echo("<div class='fiche-style'><div class='nom-style'><h6>".$style['style_name']."</h6></div>
            <form method='post' action='?styles'>
            <input type='hidden' name='style-id' value=".$style['style_id'].">
            <input type='hidden' name='style-name' value='".htmlentities($style['style_name'], ENT_QUOTES)."'>
            <input type='submit' name='modif-nom-style' value='V'>
            </form>
            <form method='post' action='?styles'>
            <input type='hidden' name='style_id' value=".$style['style_id'].">
            <input type='hidden' name='style_name' value='".htmlentities($style['style_name'], ENT_QUOTES)."'>
            <input class='delete' type='submit' name='suppr-style' value='X'>
            </form>
            </div>");
        } else {
            $lettreEnCours=strtoupper(substr($style['style_name'], 0, 1));
            echo("<div class='alphabet' id='".$lettreEnCours."'>".$lettreEnCours."<a href='?styles'><img src='ressources/up-arrow.png'></a></div>");
        }
        if (strtoupper(substr($style['style_name'], 0, 1)) != $lettreEnCours){
            echo("<div class='fiche-style'>".$style['style_name']."</div>");
        }
        
    }
    ?>
</main>
<footer>
    <p>@Cameron Findlay</p>
</footer>
<?php
include('view/view-generale-fin.php');
?>
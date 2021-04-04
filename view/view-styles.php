<header>
<form method="post">
        <input type="submit" name="creer-style" value="Nouveau style">
    </form>
    <h1>Liste de tous les styles</h1>
    <div class="menu">
        <a href="?artistes"><button class='btn-menu'>Artistes</button></a>
        <a href="?genres"><button class='btn-menu'>Genres</button></a>
        <a href="?"><img src="ressources/door.png" alt="icone de retour à l'accueil" height="100px"></a>
    </div>
</header>
<main>
    <!--utilisation d'encres pour améliorer un peu la navigation-->
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
    //on liste tous les styles en les triant par ordre alphabétique//
    $lettreEnCours = 'A';
    echo("<div class='alphabet'>".$lettreEnCours."</div>");
    while($style = $stylesTous->fetch()){
        if (strtoupper(substr($style['style_name'], 0, 1))!=$lettreEnCours){
            $lettreEnCours=strtoupper(substr($style['style_name'], 0, 1));
            echo("<div class='alphabet' id='".$lettreEnCours."'>".$lettreEnCours."<a href='?styles'><img src='ressources/up-arrow.png'></a></div>");
        } 
        echo("<div class='fiche-style'>
        <div class='gestion-style'>
        <form method='post' action='?styles'>
        <input type='hidden' name='style_id' value=".$style['style_id'].">
        <input type='hidden' name='style_name' value='".htmlentities($style['style_name'], ENT_QUOTES)."'>
        <input class='delete' type='submit' name='suppr-style' value='X'>
        </form>
        </div>
        <div class='nom-style'><h6>".$style['style_name']."</h6></div>
        <div class='options'>
        <form method='post' action='?styles'>
        <input type='hidden' name='style-id' value=".$style['style_id'].">
        <input type='hidden' name='style-name' value='".htmlentities($style['style_name'], ENT_QUOTES)."'>
        <input type='submit' name='artistes-par-style' value='Voir artistes'>
        </form>
        <form method='post' action='?styles'>
        <input type='hidden' name='style-id' value=".$style['style_id'].">
        <input type='hidden' name='style-name' value='".htmlentities($style['style_name'], ENT_QUOTES)."'>
        <input type='submit' name='modif-nom-style' value='Modif nom'>
        </form>
        </div></div>");  
    }
    ?>
</main>
<footer>
    <p>@Cameron Findlay</p>
</footer>
<?php
include('view/view-generale-fin.php');
?>
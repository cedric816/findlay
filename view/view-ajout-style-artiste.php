<?php
echo("<div class='modif-nom-artiste'>
        <form method='post'>
            <p>Quel style ajouter à '".htmlentities($nom, ENT_QUOTES)."' ?</p>
            <select name='style-id'>");
                $styles = $artistes->lireStylesTous();
                while ($style = $styles->fetch()){
                    echo("<option value=".$style['style_id'].">".htmlentities($style['style_name'], ENT_QUOTES)."</option>");
                }
            echo("</select>
            <input type='hidden' id='artist-id' name='artist-id' value=".$id.">
            <input class='btn-generique' type='submit' name='confirme-ajouter-style' value='Ajouter'>
            <a href=?artistes>Annuler</a>
        </form></div>");
?>
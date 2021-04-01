<?php
echo("<div class='modif-nom-genre'>
        <form method='post'>
            <p>Quel style est à ajouter au genre ".htmlentities($nom, ENT_QUOTES)." ?</p>
            <select name='style-id'>");
                $styles = $artistes->lireStylesTous();
                while ($style = $styles->fetch()){
                    echo("<option value=".$style['style_id'].">".htmlentities($style['style_name'], ENT_QUOTES)."</option>");
                }
            echo("</select>
            <input type='hidden' id='genre-id' name='genre-id' value=".$id.">
            <input type='submit' name='confirme-ajouter-style' value='Ajouter'>
            <a href=?genres>Annuler</a>
        </form></div>");
?>
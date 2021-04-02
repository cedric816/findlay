<?php
//formulaire pour supprimer un style d'un artiste//
echo("<div class='modif-nom-artiste'>
        <form method='post'>
            <h2>Quel style supprimer à '".htmlentities($nom, ENT_QUOTES)."' ?</h2></br>
            <select name='style-id'>");
                $stylesArtiste = $artistes->lireStyles($id);
                while ($style = $stylesArtiste->fetch()){
                    echo("<option value=".$style['style_id'].">".htmlentities($style['style_name'], ENT_QUOTES)."</option>");
                }
            echo("</select>
            <input type='hidden' id='artist-id' name='artist-id' value=".$id.">
            <input class='btn-generique' type='submit' name='confirme-suppr-style' value='Supprimer'>
            <a href=?artistes>Annuler</a>
        </form></div>");
?>
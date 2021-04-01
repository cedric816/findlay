<?php
echo("<div class='modif-nom-style'><form method='post'>
    <h2>Supprimer le style '".htmlentities($nom, ENT_QUOTES)."' ?</h2></br>
    <input type='hidden' name='style-id' value=".$id.">
    <input class='btn-generique' type='submit' name='confirme-suppr-style' value='Oui'>
    <a href=?styles>Annuler</a>
</form></div>")
?>
<?php
//formulaire de confirmation pour supprimer un artiste//
echo("<div class='modif-nom-artiste'><form method='post'>
    <h2>Supprimer l'artiste '".htmlentities($name, ENT_QUOTES)."' ?</h2></br>
    <input type='hidden' name='artist-id' value=".$id.">
    <input class='btn-generique' type='submit' name='confirme-suppr-artiste' value='Oui'>
    <a href=?artistes>Annuler</a>
</form></div>")
?>
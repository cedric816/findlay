<?php
//création d'une classe Artiste avec toutes les fonctions qui permettront de manipuler 
//les informations des artistes
class Artiste{
    private $_pdo;
//constructeur qui récupère la variable PDO de connexion à la BDD
    function __construct($pdo){
        $this->_pdo=$pdo;
    }
//créer un artiste
    public function creer($nom){
        $req = "INSERT INTO `artists` (`artist_name`)
                VALUES (:nom)";
        $prep = $this->_pdo->prepare($req);
        $prep->execute(array(
            ':nom' => $nom
        ));
    }
//lire tous les artistes
    public function lireTous(){
        $req = "SELECT * FROM `artists` ORDER BY `artist_name` COLLATE utf8mb4_general_ci";
        $prep = $this->_pdo->prepare($req);
        $prep->execute();
        return $prep;
    }
//lire tous les styles d'un artiste
    public function lireStyles($idArtiste){
        $req = "SELECT * FROM `styles` 
                WHERE `style_id` IN(SELECT `artist_style_style_id` FROM `artists_styles` 
                WHERE `artist_style_artist_id` = :id ORDER BY `style_name` COLLATE utf8mb4_general_ci)";
        $prep = $this->_pdo->prepare($req);
        $prep->execute(array(
            ':id' => $idArtiste
        ));
        return $prep;
    }
//lire tous les styles NB: doublon avec la class styles :)
    public function lireStylesTous(){
        $req = "SELECT * FROM `styles` ORDER BY `style_name` COLLATE utf8mb4_general_ci";
        $prep = $this->_pdo->prepare($req);
        $prep->execute();
        return $prep;
    }
//ajouter un style à un artiste
    public function ajouterStyle($idArtiste, $idStyle){
        $req = "INSERT INTO `artists_styles`(`artist_style_artist_id`, `artist_style_style_id`)
                VALUES (:artistId, :styleId)";
        $prep = $this->_pdo->prepare($req);
        $prep->execute(array(
            ':artistId' => $idArtiste,
            ':styleId' => $idStyle
        ));
    }
//supprimer un style à un artiste
    public function supprStyle($idArtiste, $idStyle){
        $req = "DELETE FROM `artists_styles`
                WHERE `artist_style_artist_id` = :idArtiste 
                AND `artist_style_style_id` = :idStyle";
        $prep = $this->_pdo->prepare($req);
        $prep->execute(array(
            ':idArtiste' => $idArtiste,
            ':idStyle' => $idStyle
        ));
    }
//modifier le nom d'un artiste
    public function modifierNom($idArtiste, $nom){
        $req = "UPDATE `artists`
                SET `artist_name` = :nom
                WHERE `artist_id` = :id";
        $prep = $this->_pdo->prepare($req);
        $prep->execute(array(
            ':nom' => $nom,
            ':id' => $idArtiste
        ));
    }
//supprimer un artiste
    public function supprimer($idArtiste){
        $req1 = "DELETE FROM `artists_styles`
                WHERE `artist_style_artist_id` = :id";
        $prep1 = $this->_pdo->prepare($req1);
        $prep1->execute(array(
            'id' => $idArtiste
        ));

        $req = "DELETE FROM `artists`
                WHERE `artist_id` = :id";
        $prep = $this->_pdo->prepare($req);
        $prep->execute(array(
            ':id'=> $idArtiste
        ));
    }
}

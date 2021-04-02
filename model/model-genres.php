<?php
//même structure que la class Artiste
    class Genre{

        private $_pdo;

        public function __construct($pdo){
            $this->_pdo = $pdo;
        }
        
        public function lireTous(){
            $req = "SELECT * FROM `genres` ORDER BY `genre_name` COLLATE utf8mb4_general_ci";
            $prep = $this->_pdo->prepare($req);
            $prep->execute();
            return $prep;
        }

        public function lireStylesParGenre($idGenre){
            $req = "SELECT * FROM `styles`
                    WHERE `style_genre_id` = :idGenre";
            $prep = $this->_pdo->prepare($req);
            $prep->execute(array(
                ':idGenre' => $idGenre
            ));
            return $prep;
        }

        public function creer($nomGenre){
            $req = "INSERT INTO `genres`(`genre_name`)
                    VALUES (:nom)";
            $prep = $this->_pdo->prepare($req);
            $prep->execute(array(
                ':nom' => $nomGenre
            ));
        }

        public function modifNom($nom, $id){
            $req = "UPDATE `genres`
                    SET `genre_name` = :nom
                    WHERE `genre_id` = :id";
            $prep = $this->_pdo->prepare($req);
            $prep->execute(array(
                ':nom' => $nom,
                ':id' => $id
            ));
        }
//pour supprimer un genre, il faut d'abord supprimer ses relations avec les styles
//qui sont eux mêmme liés à la table artists_styles
        public function supprimer($id){
            $req3 = "SELECT * FROM `styles` WHERE `style_genre_id` = :id";
            $prep3 = $this->_pdo->prepare($req3);
            $prep3->execute(array(
                ':id' => $id
            ));

            while ($style = $prep3->fetch()){
                $req2 = "DELETE FROM `artists_styles`
                    WHERE `artist_style_style_id`  = :id";
                    $prep2 = $this->_pdo->prepare($req2);
                    $prep2->execute(array(
                    ':id' => $style['style_id']
                ));
            }
            

            $req1 = "DELETE FROM `styles` WHERE `style_genre_id` = :id";
            $prep1 = $this->_pdo->prepare($req1);
            $prep1->execute(array(
                ':id' => $id
            ));

            $req = "DELETE FROM `genres` WHERE `genre_id` = :id";
            $prep = $this->_pdo->prepare($req);
            $prep->execute(array(
                ':id' => $id
            ));

            
        }

    }
?>
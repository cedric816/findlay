<?php
//on est sur le routeur
//à partir de la variable globale $_server, 
//on récupère la query string pour rediriger vers le bon controleur
parse_str($_SERVER["QUERY_STRING"], $query_string); 
$keys = array_keys($query_string);
$route = array_shift($keys);

switch ($route){
    case "genres": 
        include('controller/control-genres.php');
        break;
    case "styles":
        include('controller/control-styles.php');
        break;
    case "artistes":
        include('controller/control-artistes.php');
        break;
    default:
        include('view/view-accueil.php');
        break;
}

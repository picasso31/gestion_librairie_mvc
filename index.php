
<?php 
require_once('Models/Model.php');
require_once('Controllers/Controller.php');
require_once('Utils/header.php');

$controllers=['home','livres','fournisseurs','commandes','connexion',];
$controller_default='connexion';

if(isset($_GET['controller']) and in_array($_GET['controller'],$controllers))
{
    $nom_controller=$_GET['controller'];
}
else
    $nom_controller=$controller_default;

$nom_classe="Controller_".$nom_controller;
$nom_fichier="Controllers/".$nom_classe.".php";


if(file_exists($nom_fichier))
{
    require_once("$nom_fichier");
    $controller=new $nom_classe();
}
else 
    exit("ERROR 404:not found");

require_once('Utils/footer.php');


function redirectToUrl(string $url): never
{
    header("Location: {$url}");
    exit();
}
?>
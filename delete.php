<?php 

require_once 'inc/config.php';

$id = $_GET['id']; //récupérer l'id de l'enregistrement à supprimer

//requête de suppression
$sql = "DELETE FROM users WHERE id = :id";

header("location: index.php");
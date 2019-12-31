<?php

/* Affichage d'un article aléatoire d'un blog qui tourne avec Joomla 3.X */
/* Cette version n'utilise pas l'API de Joomla */
/* version 0.6.1 */

require_once 'configuration.php' ;
$config =new JConfig();

/* Affichage de l'article */

try {
	$pdo = new PDO ('mysql:host='.$config->host .';dbname='.$config->db, $config->user, $config->password);
	// $pdo = new PDO('mysql:charset=utf8mb4');
	$pdo->exec ( 'SET NAMES utf8' );
	}
catch ( Exception $e ) 
	{
	die ( 'Erreur: '.$e->getMessage () );
	}

$sql = "select * from ".$config->dbprefix."content where state='1'";
$req = $pdo->query ( $sql );

$i = 0;

while ( $row = $req->fetch (PDO::FETCH_ASSOC) )
	{
	$tab[$i] = $row['id'];		
	$i++;
	}
	
$totalArticle = count($tab);
$idArticle = rand(5,$totalArticle);

header("Refresh: 0;URL=index.php?option=com_content&view=article&id=".$tab[$idArticle]);

?>
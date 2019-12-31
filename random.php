<?php

/* Affichage d'un article aléatoire d'un blog qui tourne avec Joomla 3.X */
/* Cette version utilise l'API de Joomla */
/* version 0.2.1 */

define('_JEXEC', 1);
define('JPATH_BASE', __DIR__ . '/');
require_once JPATH_BASE . '/includes/defines.php';
require_once JPATH_BASE . '/includes/framework.php';

// Création d'une connexion avec la Base de données
$db = JFactory::getDbo();

// La requête est un objet
$query = $db->getQuery(true);

// The requête
$db->setQuery("select * from #__content where state='1'");
$data = $db->loadObjectList();

$i = 0;

/* Ici, enr correspond à un enregistrement (une ligne) de la Base de données */

foreach ( $data AS $enr )
{
	$tab[$i] = $enr->id;
	$i++;	
}

// On compte les articles, et on en choisi un au hasard entre le premier et le dernier

$totalArticle = count($tab);
$idArticle = rand($tab[0],$totalArticle);

// Here, you move towards the random article.
header("Refresh: 0;URL=index.php?option=com_content&view=article&id=".$tab[$idArticle]);

?>
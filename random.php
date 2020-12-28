<?php

/* Affichage d'un article aléatoire d'un blog qui tourne avec Joomla 3.X */
/* Cette version utilise l'API de Joomla */
/* version 0.3.1 */

define('_JEXEC', 1);
define('JPATH_BASE', __DIR__ . '/');
require_once JPATH_BASE . '/includes/defines.php';
require_once JPATH_BASE . '/includes/framework.php';

// Création d'une connexion avec la Base de données
$db = JFactory::getDbo();

// La requête est un objet
$query = $db->getQuery(true);

// The requête pour avoir tout les articles 
$db->setQuery("select * from #__content where state='1'");
$data = $db->loadObjectList();

// On prends un article au hasard parmi tous ceux de la liste
$idArticle = array_rand($data, 1);

// Ici, ça affiche l'article
header("Refresh: 0;URL=index.php?option=com_content&view=article&id=".$data[$idArticle]->id);

?>
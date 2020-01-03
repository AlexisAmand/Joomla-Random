<?php

/* Affichage d'un article aléatoire d'un blog qui tourne avec Joomla 3.X */
/* Cette version utilise l'API de Joomla */
/* version 0.3 */

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

$idArticle = array_rand($data, 1);

// Here, you move towards the random article.
header("Refresh: 0;URL=index.php?option=com_content&view=article&id=".$data[$idArticle]->id);

?>
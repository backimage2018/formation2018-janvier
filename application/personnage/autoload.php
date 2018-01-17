<?php
/*
 * fonction qui est appelée lorsque l'on tente d'instancier une classe non enregistrée
 * Il existe dans l'engine de php, une pile d'autoload. Dans cette pile on peut enregistrer des
 * noms de méthodes qui seront appelées lorsqu'on tentera d'instancier une classe non enregistrée.
 */
spl_autoload_register ( 'loadClass' );

/**
 * Permet d'exécuter l'instruction require 'maClasse.class.php' dynamiquement
 *
 * @param unknown $classeACharger        	
 */
function loadClass($classToLoad) {
	require $classToLoad . '.class.php';
}

?>
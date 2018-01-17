<?php
require 'autoload.php';

$config = parse_ini_file ( 'jeu.ini' );
print_r ( $config );
$host = $config ['host'];
$db = $config ['dbname'];
$user = $config ['user'];
$pass = $config ['pass'];
$charset = $config ['charset'];

$dsn = "mysql:host=$host;dbname=$db;charset=$charset"; // $dsn = "mysql:host='127.0.0.1';dbname='formation';charset='utf8_bin'";
/**
 * This class permit to the the class PersonnageManagerTester
 *
 * @var PersonnageManager $PM
 */
$PM = new PersonnageManager ( new PDO ( $dsn, $user, $pass ) ); // create the class to test > PersonnageManager

/*
 * Test the getAll() method of the PersonnageManager object
 * -Call the getAll method on the object to test
 * -Display the list of names on the screen
 */
echo '<br/>GET ALL';

$toutLesPersonnages = $PM->getAll ();
foreach ( $toutLesPersonnages as $unDeMaListe ) {
	echo '<br/>' . $unDeMaListe->getId () . ' with name : ' . $unDeMaListe->getNom ();
}
/* END - getAll() */
/*
 * Test the getPersonnage(id) method of the PersonnageManager object
 * -Call the getPersonnage method on the object to test and pass it an id from an existing record in DB
 * -Display the id and the name of the personnage on the screen
 */
echo '<br/>GET';

$unSeulPersonnage = $PM->getPersonnageById ( 2 );
echo '<br/>' . $unSeulPersonnage->getId () . ' with name : ' . $unSeulPersonnage->getNom ();
/* END - getPersonnage(id) */
/*
 * Test the addPersonnage(personnage) method of the PersonnageManager object
 * -Create an object Personnage
 * -Create an array with the data of the Personnage with key and value
 * -Fill the data into the object using the method hydrate on the Personnage object
 * -Call the addPersonnage method on the object to test and pass it the Personnage object
 * -Display the id and the name of the personnage on the screen
 */
echo '<br/>ADD';
$nouveauPersonnage = new Personnage ();
$dataDuNouveauPerso = array (
		'nom' => 'Polo',
		'niveau' => 1,
		'experience' => 52,
		'forcePerso' => Personnage::FORCE_MOYENNE,
		'localisation' => 'Porto',
		'degats' => 20 
);
$nouveauPersonnage->hydrate ( $dataDuNouveauPerso );
$PM->addPersonnage ( $nouveauPersonnage );

echo '<br/>' . $nouveauPersonnage->getId () . ' with name : ' . $nouveauPersonnage->getNom ();
/* END - addPersonnage() */
/*
 * Test the modifyPersonnage(personnage) method of the PersonnageManager object
 * -Get a Personnage from the DB using the last id used by the DB (from the personnage added just before)
 * -Display the id and the name of the personnage before modifying it
 * -Change the name of the the Personnage
 * -Call the modifyPersonnage method on the object to test and pass it the modified Personnage object
 * -Reload the Personnage from the DB
 * -Display the id and the name from the reloaded personnage
 */

echo '<br/>MODIFY';
$personnageFromDB = $PM->getPersonnageById ( $nouveauPersonnage->getId () );
echo '<br/>' . $personnageFromDB->getId () . ' with name : ' . $personnageFromDB->getNom ();
$personnageFromDB->setNom ( 'Pala' );

$PM->modifyPersonnageById ( $personnageFromDB );
$reloadedPersonnage = $PM->getPersonnageById ( $personnageFromDB->getId () );
echo '<br/>' . $reloadedPersonnage->getId () . ' with name : ' . $reloadedPersonnage->getNom ();
/* END - modifyPersonnage() */
/*
 * Test the deletePersonnage(id) method of the PersonnageManager object
 * -Delete the personnage last inserted personnage from the DB (from the personnage added just before)
 * -Display the id and the name of the personnage before modifying it
 * -Change the name of the the Personnage
 * -Call the modifyPersonnage method on the object to test and pass it the modified Personnage object
 * -Reload the Personnage from the DB
 * -Display the id and the name from the reloaded personnage
 */
echo '<br/>DELETE';
$PM->deletePersonnageById ( $personnageFromDB->getId () );
/* END - delete() */
echo '<br/>SELECT .... LIKE';
$listpersos = $PM->getPersonnageLikeNom ( 'M' );
print_r ( $listpersos );
?>
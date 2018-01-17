<?php
require 'autoload.php';
$config = parse_ini_file('jeu.ini');
$host = $config['host'];
$db = $config['dbname'];
$user = $config['user'];
$pass = $config['pass'];
$charset = $config['charset'];

$dsn = "mysql:host=$host;dbname=$db;charset=$charset"; // $dsn = "mysql:host='127.0.0.1';dbname='formation';charset='utf8_bin'";
$PM = new PersonnageManager(new PDO($dsn, $user, $pass)); // create the class to test > PersonnageManager

$ajouter = isset($_GET["Ajouter"]) ? $_GET["Ajouter"] : null;
$effacer = isset($_GET["Effacer"]) ? $_GET["Effacer"] : null;
$modifier = isset($_GET["Modifier"]) ? $_GET["Modifier"] : null;
$selectionner = isset($_GET["Selectionner"]) ? $_GET["Selectionner"] : null;
$nom = isset($_GET["nom"]) ? $_GET["nom"] : null;
$experience = isset($_GET["experience"]) ? $_GET["experience"] : null;
$niveau = isset($_GET["niveau"]) ? $_GET["niveau"] : null;
$location = isset($_GET["location"]) ? $_GET["location"] : null;
$degats = isset($_GET["degats"]) ? $_GET["degats"] : null;
$forceperso = isset($_GET["forceperso"]) ? $_GET["forceperso"] : null;

$message = 'Aucun message à afficher';
if (isset($ajouter)) {
    $message = 'Vous avez clic sur le bouton Ajouter';
    if (empty($nom) || empty($experience) || empty($location) || empty($degats) || empty($forceperso) || empty($niveau)) {
        $message = 'Vous devez encoder toutes les valeurs pour ajouter un personnage';
    } else {
        $message = 'Ajout de ' . $nom;
        $persoAAjouter = new Personnage();
        $persoAAjouter->setNom($nom);
        $persoAAjouter->setNiveau($niveau);
        $persoAAjouter->setExperience($experience);
        $persoAAjouter->setDegats($degats);
        $persoAAjouter->setForcePerso($forceperso);
        $persoAAjouter->setLocalisation($location);
        $PM->addPersonnage($persoAAjouter);
    }
} elseif (isset($effacer)) {
    $message = 'Vous avez clic sur le bouton Effacer';
    if (empty($nom)) {
        $message = 'Vous devez encoder un nom pour effacer un personnage';
    } else {
        $message = 'Suppression de ' . $nom;
        $PM->deletePersonnageByNom($nom);
        $nom = null;
        $experience = null;
        $niveau = null;
        $degats = null;
        $forceperso = null;
        $location = null;
    }
} elseif (isset($modifier)) {
    $message = 'Vous avez clic sur le bouton Modifier';
    if (empty($nom) || empty($experience) || empty($location) || empty($degats) || empty($forceperso) || empty($niveau)) {
        $message = 'Vous devez encoder toutes les valeurs pour modifier un personnage';
    } else {
        $message = 'Modification de ' . $nom;
        $persoAModifier = new Personnage();
        $persoAModifier->setNom($nom);
        $persoAModifier->setLocalisation($location);
        $persoAModifier->setNiveau($niveau);
        $persoAModifier->setExperience($experience);
        $persoAModifier->setDegats($degats);
        $persoAModifier->setForcePerso($forceperso);
        $PM->modifyPersonnageByNom($persoAModifier);
    }
} elseif (isset($selectionner)) {
    $message = 'Vous avez clic sur le bouton Selectionner';
    if (empty($nom)) {
        $message = 'Vous devez encoder un nom pour selectionner un personnage';
    } else {
        $message = 'Chargement de ' . $nom;
        $persoACharger = $PM->getPersonnageByNom($nom);
        $experience = $persoACharger->getExperience();
        $niveau = $persoACharger->getNiveau();
        $forceperso = $persoACharger->getForcePerso();
        $degats = $persoACharger->getDegats();
        $location = $persoACharger->getLocalisation();
    }
} else {
    $message = 'Vous n\'avez pas utilisé de bouton';
}
$personnes = $PM->getAll();

$names = ' <br/>';
foreach ($personnes as $pers) {
    $names = $names . $pers->getNom() . ' | ';
}

$message = $message . $names;

?>



<!doctype html>
<html>
	<head></head>
	<body>
	<a href="./exerciceformulaire.php">Accueil</a>
	<h1>Ma page de site</h1>
	<h2><?php

echo $message?></h2>
		<form action="exerciceformulaire.php" method="get">
			Nom : <input type=text name="nom" value="<?php
echo $nom;
?>"/>
			Location : <input type="text" name="location"  value="<?php

echo $location;
?>"/>
			Experience : <input type="text" name="experience" value="<?php

echo $experience;
?>"/>
			Niveau : <input type="text" name="niveau" value="<?php

echo $niveau;
?>"/>
			Degats : <input type="text" name="degats" value="<?php

echo $degats;
?>"/>
			Force : <input type="text" name="forceperso" value="<?php

echo $forceperso;
?>"/>
			
			<br/>
			
			<input type="submit" name="Ajouter" value="Ajouter"/>
			<input type="submit" name="Effacer" value="Effacer"/>
			<input type="submit" name="Modifier" value="Modifier"/>
			<input type="submit" name="Selectionner" value="Selectionner"/>
		</form>
	</body>
</html>
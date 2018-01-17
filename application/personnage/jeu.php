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
$pdo = new PDO ( $dsn, $user, $pass );
$PM = new PersonnageManager ( $pdo );
$toutLeMonde = $PM->getAll ();
$listOfPersos = '<ul>';
foreach ( $toutLeMonde as $personnage ) {
	$listOfPersos = $listOfPersos . '<li>' . $personnage->getNom () . '</li>';
}
$listOfPersos = $listOfPersos . '</ul>'?>

<!doctype html>
<html>
	<head></head>
	<body>
		<h1>Mon site avec ma liste</h1>
		<?php
		
		echo $listOfPersos;
		?>
	</body>
</html>


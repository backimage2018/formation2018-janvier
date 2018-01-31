<?php

    $pdo = new PDO('mysql:host=localhost;dbname=formation;charset=utf8', 'poweruser', 'power');
    $statement = "insert  into discussion (message,emitter) values
	(:mess, :emitter);";
    $pst = $pdo->prepare($statement);
    $pst->bindValue(":mess", $_POST['messageinput']);
    $pst->bindValue(":emitter", $_POST['messageemitter']);
    
    print json_encode($pst->execute());
?>
<?php

    $pdo = new PDO('mysql:host=localhost;dbname=formation;charset=utf8', 'poweruser', 'power');
    $statement = "select * from discussion;";
    $pst = $pdo->prepare($statement);
    
    $pst->execute();
    $result = $pst->fetchAll(PDO::FETCH_ASSOC);
    print json_encode($result);
?>
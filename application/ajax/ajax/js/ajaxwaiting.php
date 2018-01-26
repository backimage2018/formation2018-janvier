<?php
sleep(3);
$user = [
    "Marie",
    "Jean",
    "René",
    "Arthur"
];
shuffle($user);
echo $user[0];
?>
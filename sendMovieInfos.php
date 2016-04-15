<?php

require_once 'src/config/database.php';

$prepare = $database->prepare('INSERT INTO movies(id, title, cover) VALUES(:id, :title, :cover)');

$prepare->bindValue(':id', $_POST['title']);
$prepare->bindValue(':title', $_POST['id']);
$prepare->bindValue(':cover', $_POST['cover']);
$exec = $prepare->execute();

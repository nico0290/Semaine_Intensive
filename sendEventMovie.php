<?php

require_once 'src/config/database.php';

$prepare = $database->prepare('INSERT INTO events_movies(movies_id, events_id) VALUES(:title, :eventID)');

$prepare->bindValue(':eventID', $_POST['eventID']);
$prepare->bindValue(':title', $_POST['title']);

$exec = $prepare->execute();
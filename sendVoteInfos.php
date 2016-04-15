<?php

require_once 'src/config/database.php';

$prepare = $database->prepare('INSERT INTO events_vote(events_id, fb_id, movies_id) VALUES(:events_id, :fb_id, :movies_id)');

$prepare->bindValue(':events_id', $_POST['eventsID']);
$prepare->bindValue(':fb_id', $_POST['fbID']);
$prepare->bindValue(':movies_id', $_POST['movieID']);

$exec = $prepare->execute();
echo $exec;
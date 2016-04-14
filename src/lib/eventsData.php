<?php

/**
 * Get events from user fbid
 * @param string $fbid
 * @return array
 *
 */
function getEventsFromFbID ($fbID) {
    global $database;
    
    $request = $database->prepare("
        SELECT eu.owner, e.id, e.date, em.movies_id, m.title, m.genre 
        FROM events_user eu
        INNER JOIN events e ON e.id = eu.events_id 
        INNER JOIN events_movies em ON em.events_id = eu.events_id
        INNER JOIN movies m ON m.id = em.movies_id 
        WHERE eu.fbid = '$fbID'
        GROUP BY eu.events_id 
    ");
    $request->execute();

    return $request->fetchAll();
}


function getHighestMovie($eventID) {
    global $database;

    $request = $database->prepare("
        SELECT COUNT(ev.movies_id) as votes, em.cover, em.title  
        FROM events_vote ev 
        INNER JOIN movies em ON em.id = ev.movies_id 
        WHERE ev.events_id = '$eventID' 
        GROUP BY ev.movies_id 
        ORDER BY votes DESC 
        LIMIT 1
    ");
    $request->execute();

    return $request->fetch();
}


function getHighestMovies($eventID) {
    global $database;

    $request = $database->prepare("
        SELECT COUNT(ev.movies_id) as votes, em.cover, em.title, em.id   
        FROM events_vote ev 
        INNER JOIN movies em ON em.id = ev.movies_id 
        WHERE ev.events_id = '$eventID' 
        GROUP BY ev.movies_id
        ORDER BY votes DESC 
    ");
    $request->execute();

    return $request->fetchAll();
}

function belongsToEvent($eventID, $fbID) {
    global $database;

    $request = $database->prepare("
        SELECT events_id 
        FROM events_user 
        WHERE events_id = '$eventID' AND fbid = '$fbID'
    ");
    $request->execute();
    $result = $request->fetch();

    return (!$result) ? false : true;
}


function hasVoted($eventID, $fbID) {
    global $database;

    $request = $database->prepare("
        SELECT events_id 
        FROM events_vote 
        WHERE events_id = '$eventID' AND fb_id = '$fbID'
    ");
    $request->execute();
    $result = $request->fetch();

    return (!$result) ? false : true;
}

function addVote($eventID, $fbID, $movieID) {
    global $database;

    $database->exec("INSERT INTO events_vote SET events_id = '$eventID', fb_id = '$fbID', movies_id = '$movieID'");
}


/**
 * Delete an event from his ID
 * @param string $eventID
 *
 */
function deleteEventsFromEventId ($eventID) {
    global $database;

    $database->exec("DELETE FROM events_user WHERE events_id = '$eventID'");
    $database->exec("DELETE FROM events_movies WHERE events_id = '$eventID'");
    $database->exec("DELETE FROM events_vote WHERE events_id = '$eventID'");
    $database->exec("DELETE FROM events WHERE id = '$eventID'");
}


function getOwnerByEventIdFbId ($eventID, $fbID) {
    global $database;

    $request = $database->prepare("SELECT owner FROM events_user WHERE events_id = '$eventID' AND fbid = '$fbID'");
    $request->execute();

    return @$request->fetch()->owner;
}


function createFromFbId ($fbID) {
    global $database;

    $id = substr(sha1(rand(0, 9999) * time()), 0, 4);
    $date = time() + (3600 * 24 * 7);
    $database->exec("INSERT INTO events SET id = '$id', date = '$date'");
    $database->exec("INSERT INTO events_user SET fbid = '$fbID', events_id = '$id', owner = 1");
}

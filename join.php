<?php
require_once __DIR__ ."/src/root.php";

if (!isset($_GET['event'])) {
    header('Location: index.php');
    exit;
}

$eventID = $_GET['event'];

if (!$userInfos) {
    header('Location: index.php?redirect=join.php?event='. $eventID);
    exit;
}

if (belongsToEvent($eventID, $userInfos->getId())) {
    header('Location: index.php');
    exit;
}

addUserToEvent($eventID, $userInfos->getId());
header('Location: event.php?event='. $eventID);
exit;


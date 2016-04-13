<?php

if (isset($_GET['deleteEvent'])) {
    $event = $_GET['deleteEvent'];
    $isOwner = getOwnerByEventIdFbId($event, $userInfos->getId());

    if (!$isOwner) {
        header('Location: index.php');
        exit;
    }

    deleteEventsFromEventId($event);

    header('Location: index.php');
    exit;
}

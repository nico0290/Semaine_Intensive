<?php

if (isset($_POST['events'])) {
    createFromFbId($userInfos->getId());

    header('Location: index.php');
    exit;
}

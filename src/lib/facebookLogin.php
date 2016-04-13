<?php

// When the user attempt to login
if (isset($_GET['facebookLogin'])) {
    try {
        $accessToken = $facebookHelper->getAccessToken();
    } catch (Exception $e) {
        header('Location: index.php');
        exit;
    }

    $_SESSION['fbtoken'] = $accessToken->getValue();
    header('Location: index.php');
    exit;
}



if (isset($_GET['logout'])) {
    session_destroy();

    header('Location: index.php');
    exit;
}

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
    $redirect = 'index.php';
    
    if (!empty($_GET['redirect'])) {
        $redirect = $_GET['redirect'];
    }

    header('Location: '. $redirect);
    exit;
}


if (isset($_GET['logout'])) {
    session_start();
    session_destroy();

    header('Location: ../../index.php');
    exit;
}

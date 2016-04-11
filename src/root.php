<?php
session_start();

// LIBS
require_once dirname(__DIR__) ."/vendor/autoload.php";

// CONFIGS
require_once __DIR__ ."/config/database.php";

// FACEBOOK
$facebookProvider = new Facebook\Facebook([
    'app_id' => '807673129365531',
    'app_secret' => 'aebde9e140e33fbce77c6f1e94be9f9a'
]);

$facebookHelper = $facebookProvider->getRedirectLoginHelper();


// CHECK LOGIN
$userInfos = false;

if (isset($_SESSION['fbtoken'])) {
    // We verify the token with facebook
    try {
        $response = $facebookProvider->get('/me', $_SESSION['fbtoken']);
    } catch (Exception $e) {
        session_destroy();

        header('Location: index.php');
        exit;
    }


    $userInfos = $response->getGraphUser();
}

// DATAS
require_once __DIR__ ."/lib/eventsData.php";

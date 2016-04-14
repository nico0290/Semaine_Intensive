<?php    
    $events  = getEventsFromFbID($userInfos->getId());
    $query  = $database->query('SELECT * FROM events_user');
    $fbid  = $query->fetchAll();

    require_once __DIR__ ."/template/section_header.php";

?>

<div class="homelogged">

    <h1 class="welcome">Welcome <?= $userInfos->getName() ?>!</h1>

    <form method="post">
        <button class="event" name="events">Create your event</button>
    </form>

    <p>Incoming Event</p>

    <div class="coming_event">
        <?php foreach ($events as $event): ?>
            <?php $movie = getHighestMovie($event->id); ?>
            <div class="bulle">
                <h3><?= $movie->title ?></h3>
                <img src="<?= $movie->cover ?>">
                <div class="texte_event">
                    <h2 class="date">Date: </h2><h2 class="bold"><?= date('d/m/Y', $event->date); ?></h2>
                    <br>
                    <h2 class="place"> Place: </h2><h2 class="bold">27, Rue du Progrès</h2>
                    <h2><?= $event->id ?></h2>
                </div>

                <?php if ($event->owner == true): ?>
                    <a href="?deleteEvent=<?= $event->id ?>">Supprimer</a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <a href="src/lib/facebookLogin.php?logout">Déconnexion</a>


        <?php /*foreach ($fbid as $fb_id): ?>
            <h1><?= $fb_id->fbid; ?></h1>
        <?php endforeach; */?> 

</div>

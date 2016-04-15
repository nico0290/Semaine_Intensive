<?php    
    $events  = getEventsFromFbID($userInfos->getId());
    $query  = $database->query('SELECT * FROM events_user');
    $fbid  = $query->fetchAll();

    require_once __DIR__ ."/template/section_header.php";

?>

<div class="homelogged">

    <h1 class="welcome">Welcome <?= $userInfos->getName() ?>!</h1>

    <form method="post">
        <button class="event" name="events" onclick="window.location.href = 'questionnaire.php';">Create your event</button>
    </form>

    <p>Incoming Event</p>

    <div class="coming_event">
        <?php foreach ($events as $event): ?>
            <?php $movie = getHighestMovie($event->id); ?>
            <div class="bulle">
                <h3><?= $movie->title ?></h3>
                <div class="image_index">
                    <img src="<?= $movie->cover ?>">
                </div>
                <div class="texte_event">
                    <h2 class="date">Date: </h2><h2 class="bold"><?= date('d/m/Y', $event->date); ?></h2>
                    <br>
                    <h2 class="place"> Place: </h2><h2 class="bold"><?= $event->address ?></h2>
                    <br>
                    <h2 class="bold" style="float: left; margin-left: 60px;"><?= $event->zip ?> <?= $event->city ?></h2>
                    <div class="button_event">
                        <a href="http://achappuy.com/si/event.php?event=<?= $event->id ?>" class="a">EVENT</a>
                    </div>
                </div>

                <?php if ($event->owner == true): ?>
                    <a href="?deleteEvent=<?= $event->id ?>">Supprimer</a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <a href="src/lib/facebookLogin.php?logout">Déconnexion</a>

</div>

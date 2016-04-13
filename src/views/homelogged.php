<?php    
    $events  = getEventsFromFbID($userInfos->getId());
    $query  = $database->query('SELECT fbid FROM events_user');
    $fbid  = $query->fetchAll();

?>

<form method="post">
    <button class="event" name="events">Ajouter</button>
</form>

<?php foreach ($events as $event): ?>
    <h1 class ="date"><?= date('d/m/Y', $event->date); ?></h1>
    <h1><?= $event->id; ?></h1>

    <?php if ($event->owner == true): ?>
        <a href="?deleteEvent=<?= $event->id ?>">Supprimer</a>
        <a href="src/lib/facebookLogin.php?logout">Déconnexion</a>
    <?php endif; ?>
<?php endforeach; ?>


    <?php /*foreach ($fbid as $fb_id): ?>
        <h1><?= $fb_id->fbid; ?></h1>
    <?php endforeach; */?> 

<?php    
    $events = getEventsFromFbID($userInfos->getId());
?>

<form method="post">
    <button name="events">Ajouter</button>
</form>

<?php foreach ($events as $event): ?>
    <h1><?= date('d/m/Y', $event->date); ?></h1>
    <?php if ($event->owner == true): ?>
        <a href="?deleteEvent=<?= $event->id ?>">Supprimer</a>
    <?php endif; ?>
<?php endforeach; ?>

<?php require('Partials/head.php') ?>
    <?php require('Partials/nav.php') ?>
    <h1>Tasks page</h1>
    <ul>
        <?php foreach($all_tasks as $task): ?>
            <li><?php echo $task->description; ?></li>
        <?php endforeach; ?>
    </ul>
<?php require('Partials/footer.php');
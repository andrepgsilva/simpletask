<?php require('Partials/head.php') ?>
    <?php require('Partials/nav.php') ?>
    <h1>Tasks page</h1>
    <ul>
        <?php foreach($all_tasks as $task): ?>
            <?php $id = $task->id ?>
            <?php $status = $task->completed == 1 ? '[FINISHED]' : false ?>
            <li>
                <?php echo $status; ?>
                <?php echo $task->description; ?>
            </li>
            <?php if (! $status): ?>
                <a href="/simpletask/task/finish/?id=<?php echo $id ?>">Finish Task</a>
            <?php else: ?>
                <a href="/simpletask/task/unfinished/?id=<?php echo $id ?>">Unfinished Task</a>
            <?php endif; ?>
            <a href="/simpletask/task/delete/?id=<?php echo $id ?>">Delete Task</a>
        <?php endforeach; ?>
    </ul>
<?php require('Partials/footer.php');


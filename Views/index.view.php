<?php require('Partials/head.php') ?>
    <?php require('Partials/nav.php') ?>
    <h1>Add Tasks Page</h1>
    <form action="http://localhost/simpletask/task/store" method="POST">
        <label for="taskfield"> 
            Add Task: <input type="text" name='taskfield'>
        </label>
        <input type="submit" value="Ok">
    </form>
<?php require('Partials/footer.php');
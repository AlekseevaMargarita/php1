<head>
    <meta charset="UTF-8">
    <title>Задачи</title>
</head>
<body>

<?php include 'menu.php' ?>
<h1>Задачи пользователя <?=$username ?></h1>

<form method="POST">
    <input type="radio" name="list" id="1" value="all" <?=$checked ? 'checked' : '' ?>><label for="1">Все задачи </label>
    <input type="radio" name="list" id="2" value="undone" <?=$checked ? '' : 'checked' ?>><label for="2">Невыполненные </label>
    <input type="submit" value="Показать">
</form>

<ul>
    <?php foreach ($tasks as $task) : ?>
        <li>
            <?=$task->getDescription() ?>
            <?php if ($task->getIsDone()) : ?>
                <span>-Выполнено!-</span>
            <?php else : ?>
                <a href="/?controller=tasks&action=done&id=<?=$task->getId() ?>">[Поставить отметку о выполнении]</a>
            <?php endif ?>
            <a href="/?controller=tasks&action=delete&id=<?=$task->getId() ?>">[X]</a>
        </li>
    <?php endforeach; ?>
</ul>

<form method="post" action="/?controller=tasks&action=add">
    <?php if ($error) :?>
        <div><?=$error?></div>
    <?php endif ?>
    <input type="text" name="description" placeholder="Задача">
    <input type="submit" value="Добавить задачу">
</form>

</body>
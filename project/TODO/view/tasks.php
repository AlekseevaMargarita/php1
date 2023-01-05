<head>
    <meta charset="UTF-8">
    <title>Задачи</title>
</head>
<body>

<?php include 'menu.php' ?>
<h1>Задачи пользователя <?=$username ?></h1>

<?php foreach ($tasks as $task) : ?>
    <ul>
        <li>
            <?=$task ?>
        </li>
    </ul>
<?php endforeach; ?>
</body>
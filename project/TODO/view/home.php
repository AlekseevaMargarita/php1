
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
</head>
<body>

    <?php if ($username !== null) : ?>
        <?php include 'menu.php' ?>
    <?php else : ?>
        <a href="/?controller=security">Вход</a>
    <?php endif ?>

    <h1><?=$pageHeader?></h1>

    <?php if ($username !== null) : ?>
        <p>Рады вас приветствовать, <?=$username?></p>
    <?php endif ?>
</body>

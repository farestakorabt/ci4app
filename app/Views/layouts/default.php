<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <?php if(session("message")) : ?>
        <h3><?= session("message") ?></h3>
    <?php endif ?>

    <nav>

        <a href="/">Home</a>

        <?php if(auth()->loggedIn()): ?>

            Hello <?= esc(auth()->user()->first_name) ?> <!-- esc() => htmlspecialchars(html)  -->

            <a href="<?= url_to("articles") ?>">Articles</a>

            <?php if(auth()->user()->inGroup("admin")) : ?>

                <a href="<?= url_to("admin/users") ?>">Users</a>

            <?php endif; ?>

            <a href="<?= url_to("logout") ?>">Log out</a>

        <?php else: ?>

            <a href="<?= url_to("login") ?>">Log in</a>

        <?php endif; ?>

        <?php if(session()->has("error")) :?>
            <p><?= session("error") ?></p>
        <?php endif; ?>

        <?= $this->renderSection('content') ?>

    </nav>
</body>
</html>

<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Home<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Welcome to Udemy</h1>

    <?php if(auth()->loggedIn()): ?>

        <!-- esc() => Convert special characters to HTML entities => htmlspecialchars(html)  -->
        <p>Hello <?= esc(auth()->user()->first_name) ?></p>
        
        <a href="<?= url_to("logout") ?>">Log out</a>

    <?php else: ?>

        <a href="<?= url_to("login") ?>">Log in</a>

    <?php endif; ?>

<?= $this->endSection() ?>

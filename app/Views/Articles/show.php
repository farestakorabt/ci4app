<?php $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Articles<?= $this->endSection() ?>


<?php $this->section("content") ?>

<h1><?= esc($article->title) ?></h1>

<p><?= esc($article->content) ?></p>

<a href="<?= url_to("Articles::edit", $article->id) ?>">Edit</a>

<a href="<?= url_to("Articles::confirmDelete", $article->id) ?>">Delete</a>

<?php $this->endSection() ?>
<?php $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Articles<?= $this->endSection() ?>


<?php $this->section("content") ?>

<h1><?= esc($article->title) ?></h1>

<a href="<?= url_to("Article\Image::new", $article->id) ?>">Edit article image</a>

<p><?= esc($article->content) ?></p>

<?php if($article->isOwner() || auth()->user()->can("articles.edit")): ?>

    <a href="<?= url_to("Articles::edit", $article->id) ?>">Edit</a>

<?php endif; ?>

<?php if($article->isOwner() || auth()->user()->can("articles.delete")) : ?>

    <a href="<?= url_to("Articles::confirmDelete", $article->id) ?>">Delete</a>

<?php endif; ?>

<?php $this->endSection() ?>
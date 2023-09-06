<?php $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Article<?= $this->endSection() ?>


<?php $this->section("content") ?>

<h1><?= esc($article->title) ?></h1>

<?php if($article->image) : ?>

    <img src="<?= url_to("Article\Image::get", $article->id) ?>" alt="">

    <?= form_open("articles/" . $article->id . "/image/delete") ?>

        <button onclick="return confirm('Voulez-vous vraiment supprimer cette image ?')">Delete</button>

    </form>

<?php else: ?>

    <a href="<?= url_to("Article\Image::new", $article->id) ?>">Edit image</a>

<?php endif; ?>

<p><?= esc($article->content) ?></p>

<?php if($article->isOwner() || auth()->user()->can("articles.edit")): ?>

    <a href="<?= url_to("Articles::edit", $article->id) ?>">Edit</a>

<?php endif; ?>

<?php if($article->isOwner() || auth()->user()->can("articles.delete")) : ?>

    <a href="<?= url_to("Articles::confirmDelete", $article->id) ?>">Delete</a>

<?php endif; ?>

<?php $this->endSection() ?>
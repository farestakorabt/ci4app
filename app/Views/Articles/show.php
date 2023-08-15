<?php $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Articles<?= $this->endSection() ?>


<?php $this->section('content') ?>

<h1><?= $article['title'] ?></h1>

<p><?= $article['content'] ?></p>

<?php $this->endSection() ?>
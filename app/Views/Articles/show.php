<?php $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Articles<?= $this->endSection() ?>


<?php $this->section('content') ?>

<h1><?= esc($article['title']) ?></h1>

<p><?= esc($article['content']) ?></p>

<?php $this->endSection() ?>
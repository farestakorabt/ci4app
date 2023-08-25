<?php $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Delete article<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Delete article</h1>

<p>Are you sure ?</p>

<?= form_open("articles/" . $article->id) ?>

<input type="hidden" value="delete" name="_method">

<button>Yes</button>

</form>


<?= $this->endSection() ?>
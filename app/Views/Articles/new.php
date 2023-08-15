<?php $this->extend('layouts/default') ?>

<?php $this->section('title') ?>New article<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <h1>New article</h1>

    <?= form_open("articles/create") ?>

        <label for="title">Title</label>
        <input type="text" name="title" id="title">

        <label for="content">Content</label>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>

        <button>Save</button>

    </form>

<?= $this->endSection() ?>


<?php $this->extend('layouts/default') ?>

<?php $this->section('title') ?>New article<?= $this->endSection() ?>

<?= $this->section('content') ?>

    <h1>New article</h1>

    <?php if (session()->has("errors")) : ?>

        <ul>
            <?php foreach(session('errors') as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif ?>

    <?= form_open("articles/create") ?>

        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="<?= old("title") ?>">

        <label for="content">Content</label>
        <textarea name="content" id="content" cols="30" rows="10"><?= old("content") ?></textarea>

        <button>Save</button>

    </form>

<?= $this->endSection() ?>


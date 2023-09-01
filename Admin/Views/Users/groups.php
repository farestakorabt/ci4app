<?php $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Users groups<?= $this->endSection() ?>

<?= $this->section("content") ?>

<h1>Users groups</h1>

<?= form_open("admin/users/" . $user->id . "/groups") ?>

    <label>
        <input type="checkbox" name="groups[]" value="user"
            <?= $user->inGroup("user") ? "checked" : "" ?>>User
    </label>

    <label>

        <?php if($user->id === auth()->user()->id) : ?>

            <input type="checkbox" checked disabled>admin
            <input type="hidden" name="groups[]" value="admin">

        <?php else: ?>

        <input type="checkbox" name="groups[]" value="admin"
            <?= $user->inGroup("admin") ? "checked" : "" ?>>Admin
            
        <?php endif; ?>
    </label>

    <button>Save</button>

</form>

<?= $this->endSection() ?>
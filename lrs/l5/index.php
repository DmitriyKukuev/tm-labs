<?php
$title = 'Лабораторная работа №5';

require_once '../../partials/header.php';
?>

<div class="container w-50">
    <a href="/">&lt;&minus;все лабы</a>

    <h1 class="display-4"><?= $title ?></h1>

    <?= vueTag('vue-inclined-plane') ?>
</div>

<?
require_once '../../partials/footer.php'; ?>


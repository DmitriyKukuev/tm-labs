<?php
$title = 'Лабораторная работа №6 - 2';

require_once '../../partials/header.php';
?>

<div class="container w-50 mb-5">
    <a href="/">&lt;&minus;все лабы</a>

    <h1 class="display-4"><?= $title ?></h1>

    <?= vueTag('vue-pi-finder') ?>
</div>

<?
require_once '../../partials/footer.php'; ?>


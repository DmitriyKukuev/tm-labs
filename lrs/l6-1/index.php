<?php
$title = 'Лабораторная работа №6 - 1';

$n = [500, 5000, 50000];

require_once '../../partials/header.php';
?>

<div class="container w-50 mb-5">
    <a href="/">&lt;&minus;все лабы</a>

    <h1 class="display-4"><?= $title ?></h1>

    <h3 class="mt-4"><?= $n[0] ?></h3>
    <?= vueTag('vue-check-random-generator1', ['n' => $n[0]]) ?>

    <h3 class="mt-4"><?= $n[1] ?></h3>
    <?= vueTag('vue-check-random-generator2', ['n' => $n[1]]) ?>

    <h3 class="mt-4"><?= $n[2] ?></h3>
    <?= vueTag('vue-check-random-generator3', ['n' => $n[2]]) ?>
</div>

<?
require_once '../../partials/footer.php'; ?>


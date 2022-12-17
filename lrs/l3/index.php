<?php
$title = 'Лабораторная работа №3';

require_once '../../partials/header.php';
?>

    <div class="container w-50">
        <a href="/">&lt;&minus;все лабы</a>
        <h1 class="display-4"><?= $title ?></h1>
        <hr>
        <h3>Вариант 2</h3>
        <br>
        <h1>1/5 * (x - 2)^4 + 3x - 5</h1>
        <br>
        <?
        require 'l3.php' ?>
    </div>

<?
require_once '../../partials/footer.php'; ?>
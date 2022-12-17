<?php
$title = 'Технологии моделирования';

$lrs = [
    [
        'number' => 3,
        'src' => 'l3/',
    ],
    [
        'number' => 4,
        'src' => 'l4/',
    ],
    [
        'number' => 5,
        'src' => 'l5/',
    ],
    [
        'number' => '6-1',
        'src' => 'l6-1/',
    ],
    [
        'number' => '6-2',
        'src' => 'l6-2/',
    ],
];

require_once './partials/header.php';
?>

<div class="container w-50">
    <h1 class="display-4 mb-5 mt-5"><?= $title ?></h1>
    <?
    foreach ($lrs as $lr) { ?>
        <a href="/lrs/<?= $lr['src'] ?>">Лабораторная работа №<?= $lr['number'] ?></a>
        <br>
    <? } ?>
</div>

<? require_once './partials/footer.php';
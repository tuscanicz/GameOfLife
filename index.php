<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

$game = new \DFinta\GameOfLife(
    new \DFinta\FileLoader\FileLoader(),
    __DIR__ . '/world.xml',
    9,
    3
);

$game->loadData();
$game->runWorld();

$game->print();

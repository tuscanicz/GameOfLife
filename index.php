<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

$game = new \DFinta\GameOfLife(
    new \DFinta\FileLoader\FileLoader(),
    __DIR__ . '/world.xml'
);
$game->setCells(9);
$game->setIterations(3);
$game->print();







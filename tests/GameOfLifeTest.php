<?php

declare(strict_types=1);

namespace tests;

use DFinta\GameOfLife;

final class GameOfLifeTest extends \PHPUnit\Framework\TestCase
{
    private GameOfLife $gameOfLife;
    protected function setUp(): void
    {
        parent::setUp();

        $this->gameOfLife = new GameOfLife(__DIR__ . '/../world.xml');

        $this->gameOfLife->setCells(3);
        $this->gameOfLife->setIterations(9);

        $this->gameOfLife->live();
    }

    public function testLiveCycle(): void
    {
        $results = $this->gameOfLife->getOrganisms();

        $expected = [
            1 => [1 => 'fox', 2 => 'fox', 3 => null],
            2 => [1 => 'fox', 2 => null, 3 => 'rabbit'],
            3 => [1 => 'rabbit', 2 => 'rabbit', 3 => 'rabbit'],
        ];

        $this->assertEquals($expected, $results);
    }

    public function testJsonResult(): void
    {
        $results = $this->gameOfLife->transformToJson();

        $expected = [
            "world" => [
                "cells" => 3,
                "species" => 9,
                "iterations" => 9
            ],
            "organisms" => [
                ['organism' => ['x_pos' => 1, 'y_pos' => 1, 'species' => 'fox']],
                ['organism' => ['x_pos' => 1, 'y_pos' => 2, 'species' => 'fox']],
                ['organism' => ['x_pos' => 1, 'y_pos' => 3, 'species' => null]],

                ['organism' => ['x_pos' => 2, 'y_pos' => 1, 'species' => 'fox']],
                ['organism' => ['x_pos' => 2, 'y_pos' => 2, 'species' => null]],
                ['organism' => ['x_pos' => 2, 'y_pos' => 3, 'species' => 'rabbit']],

                ['organism' => ['x_pos' => 3, 'y_pos' => 1, 'species' => 'rabbit']],
                ['organism' => ['x_pos' => 3, 'y_pos' => 2, 'species' => 'rabbit']],
                ['organism' => ['x_pos' => 3, 'y_pos' => 3, 'species' => 'rabbit']],
            ]
        ];

        $this->assertEquals($expected, $results);
    }
}
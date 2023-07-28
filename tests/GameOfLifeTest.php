<?php

declare(strict_types=1);

namespace tests;

use src\GameOfLife;

require_once dirname(__DIR__) . '/vendor/autoload.php';

final class GameOfLifeTest extends \PHPUnit\Framework\TestCase
{
    private GameOfLife $gameOfLife;
    protected function setUp(): void
    {
        parent::setUp();

        $this->gameOfLife = new GameOfLife();

        $this->gameOfLife->setCells(3);
        $this->gameOfLife->setIterations(9);
        $this->gameOfLife->setPath("world.xml");

        $this->gameOfLife->live();
    }

    public function testLiveCycle(): void
    {
        $results = $this->gameOfLife->getOrganisms();

        $expected = [];

        $this->assertEquals($expected, $results);
    }

    public function testJsonResult(): void
    {
        $results = $this->gameOfLife->transformToJson();

        $expected = [];

        $this->assertEquals($expected, $results);
    }
}
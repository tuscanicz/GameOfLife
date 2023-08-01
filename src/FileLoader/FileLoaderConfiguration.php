<?php

declare(strict_types=1);

namespace DFinta\FileLoader;

class FileLoaderConfiguration
{
    private int $cells;
    private int $iterations;
    private array $organisms;

    /**
     * @param int $cells
     * @param int $iterations
     * @param array<int, array<int, string>> $organisms
     */
    public function __construct(int $cells, int $iterations, array $organisms)
    {
        $this->cells = $cells;
        $this->iterations = $iterations;
        $this->organisms = $organisms;
    }

    public function getCells(): int
    {
        return $this->cells;
    }

    public function getIterations(): int
    {
        return $this->iterations;
    }

    /**
     * @return array<int, array<int, string>>
     */
    public function getOrganisms(): array
    {
        return $this->organisms;
    }
}

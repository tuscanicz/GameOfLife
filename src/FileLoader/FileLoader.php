<?php

declare(strict_types=1);

namespace DFinta\FileLoader;

class FileLoader
{
    /**
     * Check if xml file has all needed data
     */
    public function handleXmlFileData(\SimpleXMLElement $fileData): FileLoaderConfiguration
    {
         if (
                !isset(
                    $fileData->world,
                    $fileData->world->cells,
                    $fileData->world->species,
                    $fileData->world->iterations,
                    $fileData->organisms
                )
                || !$fileData->organisms->children()
            ) {

                throw new \Exception('Not all needed values are provided');

            } else {

                return new FileLoaderConfiguration(
                    (int) $fileData->world->cells,
                    (int) $fileData->world->iterations,
                    $this->createOrganismArray($fileData)
                );
            }
    }

    /**
     * @param \SimpleXMLElement $fileData
     * @return array<int, array<int, string>>
     * @throws \Exception
     */
    private function createOrganismArray(\SimpleXMLElement $fileData): array
    {
        $organisms = [];
        foreach ($fileData->organisms->children() as $organism) {
            if (!isset(
                $organism->x_pos,
                $organism->y_pos,
                $organism->species
            )) {

                throw new \Exception('Organism must have set x_pos, y_pos, type values');

            } else
            {
                if (
                    (int) $organism->x_pos < 1
                    || (int) $organism->y_pos < 1
                ) {
                    throw new \Exception('Organism position must be 1 or more');
                } else {
                    $organisms[(int)$organism->x_pos][(int)$organism->y_pos] = (string)$organism->species;
                }
            }
        }

        return $organisms;
    }
}


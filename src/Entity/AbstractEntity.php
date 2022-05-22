<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity;

abstract class AbstractEntity
{
    /**
     * Constructor.
     *
     * @param mixed[] $data Associative array of entity data.
     */
    public function __construct(array $data)
    {
        $this->setData($data);
    }

    /**
     * Sets entity data.
     *
     * @param mixed[] $data Associative array of entity data.
     * @return void
     */
    public function setData(array $data): void
    {
        foreach ($data as $property => $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }
}

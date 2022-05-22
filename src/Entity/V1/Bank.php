<?php

declare(strict_types=1);

namespace Gutocf\BrasilAPI\Entity\V1;

use Gutocf\BrasilAPI\Entity\AbstractEntity;

class Bank extends AbstractEntity
{
    public ?string $ispb;
    public ?string $name;
    public ?int $code;
    public ?string $fullName;

    public function setData(array $data): void
    {
        $this->ispb = $data['ispb'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->code = isset($data['code']) ? intval($data['code']) : null;
        $this->fullName = $data['fullName'] ?? null;
    }
}

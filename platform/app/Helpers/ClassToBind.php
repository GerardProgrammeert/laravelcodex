<?php

declare(strict_types=1);

namespace App\Helpers;
readonly class ClassToBind
{
    public function __construct(private string $name)
    {
    }

    public function greet(): string
    {
            return 'Hello ' . $this->name;
    }
}

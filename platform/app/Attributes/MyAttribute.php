<?php

declare(strict_types=1);

namespace App\Attributes;

use Attribute;

#[Attribute]
class MyAttribute
{
    public function __construct(public string $message)
    {
    }
}

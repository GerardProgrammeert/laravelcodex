<?php

declare(strict_types=1);

use Tests\TestCase;

use App\Attributes\MyAttribute;
use App\Attributes\MyClassWithAttributes;

class AttributeTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_use_a_php_attribute(): void
    {
        $reflectionClass = new ReflectionClass(MyClassWithAttributes::class);
        $attributes = $reflectionClass->getAttributes(MyAttribute::class);
dump($attributes);
        foreach ($attributes as $attribute) {
            // Instantiate the attribute
            $instance = $attribute->newInstance();
            dump('sdasda');
            logger($instance->message);
            dump($instance->message);
            echo $instance->message . PHP_EOL;  // Outputs: This is a custom attribute message.
        }
    }
}

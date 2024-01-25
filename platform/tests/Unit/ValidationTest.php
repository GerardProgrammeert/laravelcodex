<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ValidationTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_use_a_custom_string_rule(): void
    {
        $data = ['title' => 'sdffsdfdsdfsfdsdsfdfsfdsdfsdsfdfsdfsfdsfdsdfssdfsfdfdssdfsdfsdfsdffdssdfdsfdsffdsfsd'];

        $validator = Validator::make($data, [
            'title' => 'db_string',
        ]);

        if ($validator->fails()) {
            dump('it failes');
        }
    }
}

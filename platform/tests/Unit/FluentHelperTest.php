<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class FluentHelperTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

    }

    /**
     * @test
     */
    public function test_basics_fluent(): void
    {
        $data = [
            'user' => [
                'name' => 'Philo',
                'address' => [
                    'city' => 'Amsterdam',
                    'country' => 'Netherlands',
                ]
            ],
            'posts' => [
                [
                    'title' => 'Post 1',
                ],
                [
                    'title' => 'Post 2',
                ]
            ]
        ];

        dump(collect($data)->get('user'));
        dump(fluent($data)->user);

    }
}

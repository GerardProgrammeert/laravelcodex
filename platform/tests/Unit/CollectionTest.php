<?php

declare(strict_types=1);

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Tests\TestCase;

class CollectionTest extends TestCase
{
    public array $array;
    public Collection $collection;

    protected function setUp(): void
    {
        parent::setUp();

        Collection::macro('toUpper', function () {
            return $this->map(function (array $item) {
                $item['name'] = Str::upper($item['name']);
                return $item;
            });
        });

        Collection::macro('toLower', function () {
            return $this->map(function (array $item) {
                $item['name'] = Str::lower($item['name']);
                return $item;
            });
        });

        $this->array = [
            ['name' => 'Gerrit'],
            ['name' => 'Gerard'],
            ['name' => 'Jack'],
            ['name' => 'Herman'],
        ];

        $this->collection = collect($this->array);
    }

    /**
     * @test
     */
    public function it_can_create_a_collection_from_array(): void
    {
        $collection = collect($this->array);

        $this->assertInstanceOf(Collection::class, $collection);
    }

    /**
     * @test
     */
    public function it_can_use_first_method(): void
    {
          $result = $this->collection->first( function($item) {
             return Str::contains($item['name'], 'Ger');
          });

          $this->assertCount(1 ,$result);
          $this->assertEquals($this->array[0], $result);
    }

    /**
     * @test
     */
    public function it_can_filter_a_collection(): void
    {
        $result = $this->collection->filter( function($item) {
            return Str::contains($item['name'], 'Ger');
        });

        $this->assertCount(2 ,$result);
        $this->assertEquals(collect([$this->array[0], $this->array[1]]), $result);
    }

    /**
     * @test
     */
    public function it_can_forget_items_in_a_collection(): void
    {
        $result = $this->collection->forget([0,1]); // keys of remaining items stay the same

         $this->assertCount(2, $result);

         unset($this->array[0]);
         unset($this->array[1]);

        $this->assertEquals(collect($this->array), $result);
    }

    /**
     * @test
     */
    public function it_can_use_a_macro(): void
    {
        $collectionTransformToUpper = $this->collection->toUpper();

        dump($collectionTransformToUpper);
        dump($collectionTransformToUpper->toLower());
        dump($collectionTransformToUpper->firstUpper());
    }

    /**
     * @test
     */
    public function it_can_use_get_date(): void
    {

        $data = [
            'name' => 'Gerard',
            'key1' => 'dsfafd',
            'key2' => 'asdfdf'
        ];

        //data_get
        $this->assertEquals('Gerard', get_data($data, 'name'));
    }
}

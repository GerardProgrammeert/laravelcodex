<?php

declare(strict_types=1);

use Tests\TestCase;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use App\Models\User;

class SerializeTest extends TestCase
{
    /**
     * @test
     */
    public function test_it_can_use_serializer_component()
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $user = User::factory()->make()->toArray();
        dump($user);
        $jsonContent = $serializer->serialize($user, 'json');
        dump($jsonContent);
    }
}

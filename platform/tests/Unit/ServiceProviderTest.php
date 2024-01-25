<?php

declare(strict_types=1);

use App\Helpers\ClassToBind;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan("db:seed");
    }

    /**
     * @test
     */
    public function it_can_bind_a_class(): void
    {
        $instance = $this->app->make(ClassToBind::class);
        $this->assertInstanceOf(ClassToBind::class, $instance);

        $this->assertSame($instance->greet(), 'Hello Gerard');
    }

    /**
     * @test
     */
    public function it_can_use_a_singleton(): void
    {
        $user = $this->app->get('currentUser');
        dump($this->app->get('App\Helpers\Singleton'));
        //dump($this->app->getBindings());
        $this->assertInstanceOf(User::class, $user);
    }
}

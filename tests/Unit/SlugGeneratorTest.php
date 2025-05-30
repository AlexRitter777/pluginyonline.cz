<?php

namespace Tests\Unit;

use App\Models\Slug;
use App\Services\SlugGenerator;
use Mockery;
use PHPUnit\Framework\TestCase;

class SlugGeneratorTest extends TestCase
{

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }

    private function mockSlugExists($mock, string $slug, bool $exists): void
    {
        $mock->shouldReceive('where')
            ->with('slug', $slug)
            ->once()
            ->andReturnSelf();
        $mock->shouldReceive('exists')
            ->once()
            ->andReturn($exists);
    }

    public function test_returns_unique_slug(): void
    {
        //firs slug is unique
        $mock = Mockery::mock(Slug::class);

        $this->mockSlugExists($mock, 'my-title', false);

        $slugGenerator = new SlugGenerator($mock);

        $slug = $slugGenerator->generateSlug('My title');

        $this->assertEquals('my-title', $slug);

    }

    public function test_returns_unique_slug_within_limit(): void
    {
        $mock = Mockery::mock(Slug::class);

        $this->mockSlugExists($mock, 'tung-tung-tung-tung-tung-tung-tung-tung-tung-sahur-a-scary-anomaly-that', false);

        $slugGenerator = new SlugGenerator($mock);

        $slug = $slugGenerator->generateSlug('Tung, tung, tung, tung, tung, tung, tung, tung, tung, sahur. A scary anomaly that only comes', 85);

        $this->assertEquals('tung-tung-tung-tung-tung-tung-tung-tung-tung-sahur-a-scary-anomaly-that', $slug);

    }

    public function test_returns_unique_slug_within_short_limit(): void
    {
        $mock = Mockery::mock(Slug::class);

        $this->mockSlugExists($mock, 'scar', false);

        $slugGenerator = new SlugGenerator($mock);

        $slug = $slugGenerator->generateSlug('Scary anomaly that only comes', 4);

        $this->assertEquals('scar', $slug);

    }

    public function test_returns_unique_slug_within_limit_with_space(): void
    {
        $mock = Mockery::mock(Slug::class);

        $this->mockSlugExists($mock, 'scary', false);

        $slugGenerator = new SlugGenerator($mock);

        $slug = $slugGenerator->generateSlug('Scary anomaly that only comes', 6);

        $this->assertEquals('scary', $slug);

    }

    public function test_returns_unique_slug_after_one_attempt(): void
    {
        $mock = Mockery::mock(Slug::class);

        $this->mockSlugExists($mock, 'scary-anomaly-that-only-comes', true);
        $this->mockSlugExists($mock, 'scary-anomaly-that-only-comes-1', false);

        $slugGenerator = new SlugGenerator($mock);
        $slug = $slugGenerator->generateSlug('Scary anomaly that only comes');

        $this->assertEquals('scary-anomaly-that-only-comes-1', $slug);

    }

    public function test_returns_unique_slug_after_two_attempts(): void
    {
        $mock = Mockery::mock(Slug::class);

        $this->mockSlugExists($mock, 'scary-anomaly-that-only-comes', true);
        $this->mockSlugExists($mock, 'scary-anomaly-that-only-comes-1', true);
        $this->mockSlugExists($mock, 'scary-anomaly-that-only-comes-2', false);

        $slugGenerator = new SlugGenerator($mock);
        $slug = $slugGenerator->generateSlug('Scary anomaly that only comes');

        $this->assertEquals('scary-anomaly-that-only-comes-2', $slug);

    }

    public function test_returns_unique_slug_after_four_attempts_within_limit(): void
    {
        $mock = Mockery::mock(Slug::class);

        $this->mockSlugExists($mock, 'scary-anomaly', true);
        $this->mockSlugExists($mock, 'scary-anomaly-1', true);
        $this->mockSlugExists($mock, 'scary-anomaly-2', true);
        $this->mockSlugExists($mock, 'scary-anomaly-3', true);
        $this->mockSlugExists($mock, 'scary-anomaly-4', false);

        $slugGenerator = new SlugGenerator($mock);
        $slug = $slugGenerator->generateSlug('Scary anomaly that only comes', 18);

        $this->assertEquals('scary-anomaly-4', $slug);

    }


}

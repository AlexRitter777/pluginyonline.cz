<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_is_displayed(): void
    {
        $user = User::factory()->create(['is_admin' => true]);

        $response = $this
            ->actingAs($user)
            ->get('/rw-admin/profile');

        $response->assertOk();
    }

    public function test_profile_information_can_be_updated(): void
    {
        $user = User::factory()->create(['is_admin' => true]);

        $response = $this
            ->actingAs($user)
            ->from('/rw-admin/profile')
            ->put('/rw-admin/profile', [
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/rw-admin/profile');

        $user->refresh();

        $this->assertSame('Test User', $user->name);
        $this->assertSame('test@example.com', $user->email);
        $this->assertNull($user->email_verified_at);
    }

    public function test_email_verification_status_is_unchanged_when_the_email_address_is_unchanged(): void
    {
        $user = User::factory()->create(['is_admin' => true]);

        $response = $this
            ->actingAs($user)
            ->from('/rw-admin/profile')
            ->put('/rw-admin/profile', [
                'name' => 'Test User',
                'email' => $user->email,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/rw-admin/profile');

        $this->assertNotNull($user->refresh()->email_verified_at);
    }


}

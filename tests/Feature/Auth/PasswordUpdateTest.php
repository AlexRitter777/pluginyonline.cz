<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PasswordUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_can_be_updated(): void
    {
        $user = User::factory()->create(['is_admin' => true]);

        $response = $this
            ->actingAs($user)
            ->from('/rw-admin/profile')
            ->put('/rw-admin/password', [
                'current_password' => 'password',
                'password' => 'New-password',
                'password_confirmation' => 'New-password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/rw-admin/profile');

        $this->assertTrue(Hash::check('New-password', $user->refresh()->password));
    }

    public function test_correct_password_must_be_provided_to_update_password(): void
    {
        $user = User::factory()->create(['is_admin' => true]);

        $response = $this
            ->actingAs($user)
            ->from('/rw-admin/profile')
            ->put('/rw-admin/password', [
                'current_password' => 'wrong-password',
                'password' => 'New-password',
                'password_confirmation' => 'New-password',
            ]);

        $response
            ->assertSessionHasErrors('current_password')
            ->assertRedirect('/rw-admin/profile');
    }
}

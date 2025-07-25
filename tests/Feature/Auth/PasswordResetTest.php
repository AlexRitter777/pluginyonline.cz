<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Notifications\MailResetPasswordToken;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_link_screen_can_be_rendered(): void
    {
        $response = $this->get('/rw-admin/forgot-password');

        $response->assertStatus(200);
    }

    public function test_reset_password_link_can_be_requested(): void
    {
        Notification::fake();

        $user = User::factory()->create(['is_admin' => true]);

        $this->post('/rw-admin/forgot-password', ['email' => $user->email]);

        Notification::assertSentTo($user, MailResetPasswordToken::class);
    }

    public function test_reset_password_screen_can_be_rendered(): void
    {
        Notification::fake();

        $user = User::factory()->create(['is_admin' => true]);

        $this->post('/rw-admin/forgot-password', ['email' => $user->email]);

        Notification::assertSentTo($user, MailResetPasswordToken::class, function ($notification) {
            $response = $this->get('/rw-admin/reset-password/'.$notification->token);

            $response->assertStatus(200);

            return true;
        });
    }

    public function test_password_can_be_reset_with_valid_token(): void
    {
        Notification::fake();

        $user = User::factory()->create(['is_admin' => true]);

        $this->post('/rw-admin/forgot-password', ['email' => $user->email]);

        Notification::assertSentTo($user, MailResetPasswordToken::class, function ($notification) use ($user) {
            $response = $this->post('rw-admin/reset-password', [
                'token' => $notification->token,
                'email' => $user->email,
                'password' => 'Password',
                'password_confirmation' => 'Password',
            ]);

            $response
                ->assertSessionHasNoErrors()
                ->assertRedirect(route('login'));

            return true;
        });
    }
}

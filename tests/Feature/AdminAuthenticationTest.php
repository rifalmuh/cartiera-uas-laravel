<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_page_is_protected_by_session_middleware(): void
    {
        $this->get('/admin')->assertRedirect('/login');
    }

    public function test_admin_can_login_and_logout_manually(): void
    {
        $user = User::create([
            'name' => 'Admin Test',
            'username' => 'admin_test',
            'password' => Hash::make('secret123'),
        ]);

        $this->post('/login', ['username' => $user->username, 'password' => 'secret123'])
            ->assertRedirect('/admin')
            ->assertSessionHas('admin_user_id', $user->id);

        $this->withSession(['admin_user_id' => $user->id, 'admin_name' => $user->name])
            ->post('/admin/logout')
            ->assertRedirect('/login')
            ->assertSessionMissing('admin_user_id');
    }

    public function test_invalid_login_is_rejected(): void
    {
        $this->post('/login', ['username' => 'wrong_admin', 'password' => 'wrong-password'])
            ->assertSessionHasErrors('username')
            ->assertSessionMissing('admin_user_id');
    }
}

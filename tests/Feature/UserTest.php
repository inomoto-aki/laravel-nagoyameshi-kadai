<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
use RefreshDatabase;

public function test_guest_cannot_access_user_index()
{
    $reponse = $this->get(route('user.index'));

    $reponse->assertRedirect(route('login'));
}

public function test_user_can_access_user_index()
{
    $user = User::factory()->create();

    $response = $this->atingAs($user)->get(route('user.index'));

    $response->assertStatus(200);
}

public function test_admin_cannot_access_user_index()
{
    $admin = new Admin();
    $admin->email = 'admin@example.com';
    $admin->password = Hash::make('nagoyameshi');
    $admin->save();

    $response = $this>actingAs($admin, 'admin')->get(route('user.index'));

    $ressponse->assertRedirect(route('admin.home'));
}

}

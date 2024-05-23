<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class PageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_homepage(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_login_page(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_login_redirect_dashboard(): void
    {
        $user = User::where('name', 'Jamie Anacleto')->first();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/dashboard');

        $response->assertStatus(200);
    }

    public function test_can_see_products_page(): void
    {
        $user = User::where('name', 'Jamie Anacleto')->first();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/products');

        $response->assertSeeText("Product name");
    }

    public function test_can_see_user_management_page(): void
    {
        $user = User::where('name', 'Jamie Anacleto')->first();

        $response = $this->actingAs($user)
            ->withSession(['banned' => false])
            ->get('/users/management');

        $response->assertSeeText("Roles");
    }
    
}

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_add_product_and_frontend_shows_it(): void
    {
        $response = $this->post('/admin/products', [
            'name' => 'Demo Shirt',
            'price' => 499,
            'description' => 'Simple cotton shirt',
            'image_url' => 'https://example.com/shirt.jpg',
        ]);

        $response->assertRedirect('/admin/products');
        $this->assertDatabaseHas('products', [
            'name' => 'Demo Shirt',
            'price' => 499,
        ]);

        $this->get('/')
            ->assertSee('Featured Products')
            ->assertSee('Cartoon Astronaut T-Shirts')
            ->assertSee('Demo Shirt');
    }
}

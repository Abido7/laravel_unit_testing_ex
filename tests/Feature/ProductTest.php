<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test product.
     *
     * @return void
     */
    public function test_products_page_empty_table()
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
        $response->assertSee('no products found');
    }

    /**
     * A basic feature test product.
     *
     * @return void
     */
    public function test_products_page_has_data()
    {
        Product::factory()->create();
        $response = $this->get('/products');
        $response->assertStatus(200);
        $response->assertDontSee('no products found');
    }

    /**
     * A basic feature test product.
     *
     * @return void
     */
    public function test_products_page_pagination()
    {
        $products = Product::factory(11)->create();
        $last = $products->last();
        $response = $this->get('/products');
        $response->assertStatus(200);
        $response->assertViewHas('products', function ($collection) use ($last) {
            return $collection->contains($last);
        });
    }


}


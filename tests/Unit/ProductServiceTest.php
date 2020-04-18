<?php

namespace Tests\Unit;

use App\Services\ProductService;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class ProductServiceTest extends TestCase {
    private $productService;

    public function setUp(): void {
        parent::setUp();

        Artisan::call('migrate');

        $this->productService = new ProductService();
    }

    /** @test */
    public function shouldCreateNewProduct() {
        $product = [
            'sku' => '123',
            'title' => 'Test',
            'description' => 'Test dsc',
            'quantity' => 5,
            'price' => '10.00'
        ];

        $create = $this->productService->create($product);

        $this->assertEquals($create['sku'], $product['sku']);
    }
}

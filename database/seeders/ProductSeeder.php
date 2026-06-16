<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name'        => 'Remera Negra Básica',
                'description' => 'Remera de algodón 100%, corte regular',
                'price'       => 5000,
                'stock'       => 20,
                'image'       => null,
                'category_id' => 1,
                'active'      => true,
            ],
            [
                'name'        => 'Remera Blanca Oversize',
                'description' => 'Remera oversize, tela premium',
                'price'       => 6500,
                'stock'       => 15,
                'image'       => null,
                'category_id' => 1,
                'active'      => true,
            ],
            [
                'name'        => 'Jean Azul Slim',
                'description' => 'Jean slim fit, tiro medio',
                'price'       => 12000,
                'stock'       => 10,
                'image'       => null,
                'category_id' => 2,
                'active'      => true,
            ],
            [
                'name'        => 'Jean Negro Recto',
                'description' => 'Jean recto, corte clásico',
                'price'       => 11000,
                'stock'       => 8,
                'image'       => null,
                'category_id' => 2,
                'active'      => true,
            ],
            [
                'name'        => 'Buzo Hoodie Gris',
                'description' => 'Hoodie con capucha, tela frizada',
                'price'       => 9000,
                'stock'       => 12,
                'image'       => null,
                'category_id' => 3,
                'active'      => true,
            ],
            [
                'name'        => 'Gorra Negra',
                'description' => 'Gorra snapback, talla única',
                'price'       => 3500,
                'stock'       => 25,
                'image'       => null,
                'category_id' => 4,
                'active'      => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
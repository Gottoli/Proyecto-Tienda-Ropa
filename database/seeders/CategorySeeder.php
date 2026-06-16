<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name'        => 'Remeras',
                'slug'        => 'remeras',
                'description' => 'Remeras de todo tipo',
                'active'      => true,
            ],
            [
                'name'        => 'Jeans',
                'slug'        => 'jeans',
                'description' => 'Jeans y pantalones',
                'active'      => true,
            ],
            [
                'name'        => 'Buzos',
                'slug'        => 'buzos',
                'description' => 'Buzos y hoodies',
                'active'      => true,
            ],
            [
                'name'        => 'Accesorios',
                'slug'        => 'accesorios',
                'description' => 'Cinturones, gorras y más',
                'active'      => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
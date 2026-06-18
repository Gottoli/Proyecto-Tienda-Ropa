<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Asegurar que exista la categoría Camperas (id 5)
        $campCat = Category::firstOrCreate(
            ['slug' => 'camperas'],
            [
                'name'        => 'Camperas',
                'description' => 'Camperas y abrigos',
                'active'      => true,
            ]
        );

        // Renombrar Jeans → Pantalones para que coincida con el filtro del catálogo
        Category::where('slug', 'jeans')->update(['name' => 'Pantalones', 'slug' => 'pantalones']);

        $campId  = $campCat->id;
        $remId   = 1;  // Remeras
        $pantId  = 2;  // Pantalones (ex-Jeans)
        $buzoId  = 3;  // Buzos

        // ── Actualizar productos existentes con imágenes ──────────────────────
        $existing = [
            1 => ['image' => 'remera1.jpg',    'images' => null],
            2 => ['image' => 'remera2.jpg',     'images' => null],
            3 => ['image' => 'pantalon1.jpeg',  'images' => null],
            4 => ['image' => 'pantalon2.jpeg',  'images' => null],
            5 => ['image' => 'buzo1.jpg',       'images' => null],
            6 => ['image' => null,              'images' => null], // Gorra — sin imagen
            7 => ['image' => 'remera3.jpeg',    'images' => null],
        ];

        foreach ($existing as $id => $data) {
            Product::where('id', $id)->update([
                'image'  => $data['image'],
                'images' => $data['images'] ? json_encode($data['images']) : null,
            ]);
        }

        // ── Nuevos productos con todas las imágenes restantes ─────────────────
        $nuevos = [

            // ── Remeras hombre ──────────────────────────────────────────────
            [
                'name'        => 'Remera Essential',
                'description' => 'Remera de algodón peinado, corte regular. Tela suave y duradera.',
                'price'       => 7200,
                'stock'       => 18,
                'talles'      => 'XS,S,M,L,XL',
                'image'       => 'remera4.jpg',
                'images'      => null,
                'category_id' => $remId,
                'active'      => true,
            ],
            [
                'name'        => 'Remera Básica',
                'description' => 'Remera lisa de uso diario, 100% algodón orgánico.',
                'price'       => 5800,
                'stock'       => 22,
                'talles'      => 'XS,S,M,L,XL,XXL',
                'image'       => 'remera5.jpg',
                'images'      => null,
                'category_id' => $remId,
                'active'      => true,
            ],
            [
                'name'        => 'Remera Técnica',
                'description' => 'Remera técnica con tela stretch. Ideal para deporte y lifestyle.',
                'price'       => 9500,
                'stock'       => 14,
                'talles'      => 'S,M,L,XL',
                'image'       => 'remera7.webp',
                'images'      => null,
                'category_id' => $remId,
                'active'      => true,
            ],
            [
                'name'        => 'Remera Premium Lavada',
                'description' => 'Remera con lavado especial. Efecto vintage, corte oversize.',
                'price'       => 11000,
                'stock'       => 10,
                'talles'      => 'S,M,L,XL',
                'image'       => 'remera8.jpg',
                'images'      => ['remera8.jpg', 'remera8,2.jpg'],
                'category_id' => $remId,
                'active'      => true,
            ],
            [
                'name'        => 'Remera Minimalista',
                'description' => 'Remera con gráfico minimalista bordado. Tela pesada 220g.',
                'price'       => 10500,
                'stock'       => 12,
                'talles'      => 'XS,S,M,L,XL',
                'image'       => 'remera9.jpg',
                'images'      => ['remera9.jpg', 'remera9,2.webp'],
                'category_id' => $remId,
                'active'      => true,
            ],
            [
                'name'        => 'Remera Signature',
                'description' => 'Remera signature de la colección. Detalle en contraste en cuello.',
                'price'       => 12500,
                'stock'       => 8,
                'talles'      => 'XS,S,M,L,XL',
                'image'       => 'remera10.webp',
                'images'      => ['remera10.webp', 'remera10,2.webp'],
                'category_id' => $remId,
                'active'      => true,
            ],

            // ── Remeras mujer ────────────────────────────────────────────────
            [
                'name'        => 'Remera Mujer Básica',
                'description' => 'Remera femenina de corte recto, tela suave 180g.',
                'price'       => 6000,
                'stock'       => 20,
                'talles'      => 'XS,S,M,L',
                'image'       => 'mremera1.jpg',
                'images'      => null,
                'category_id' => $remId,
                'active'      => true,
            ],
            [
                'name'        => 'Remera Mujer Oversize',
                'description' => 'Remera oversize femenina, hombros caídos. Estilo editorial.',
                'price'       => 8000,
                'stock'       => 16,
                'talles'      => 'XS,S,M,L',
                'image'       => 'mremera2.jpg',
                'images'      => null,
                'category_id' => $remId,
                'active'      => true,
            ],
            [
                'name'        => 'Remera Mujer Clásica',
                'description' => 'Remera femenina con escote redondo. Algodón peinado premium.',
                'price'       => 7000,
                'stock'       => 18,
                'talles'      => 'XS,S,M,L,XL',
                'image'       => 'mremera3.jpg',
                'images'      => null,
                'category_id' => $remId,
                'active'      => true,
            ],
            [
                'name'        => 'Remera Mujer Essential',
                'description' => 'Remera femenina esencial de temporada. Corte entallado.',
                'price'       => 7500,
                'stock'       => 15,
                'talles'      => 'XS,S,M,L',
                'image'       => 'mremera4.jpg',
                'images'      => null,
                'category_id' => $remId,
                'active'      => true,
            ],
            [
                'name'        => 'Remera Mujer Sport',
                'description' => 'Remera deportiva femenina, tela dry-fit. Corte ajustado.',
                'price'       => 9000,
                'stock'       => 12,
                'talles'      => 'XS,S,M,L',
                'image'       => 'meremera5.jpg',
                'images'      => null,
                'category_id' => $remId,
                'active'      => true,
            ],

            // ── Pantalones ───────────────────────────────────────────────────
            [
                'name'        => 'Jean Wide Leg',
                'description' => 'Jean de tiro alto y pierna ancha. Corte moderno y cómodo.',
                'price'       => 14500,
                'stock'       => 10,
                'talles'      => 'XS,S,M,L,XL',
                'image'       => 'pantalon3.jpg',
                'images'      => null,
                'category_id' => $pantId,
                'active'      => true,
            ],
            [
                'name'        => 'Pantalón Cargo',
                'description' => 'Pantalón cargo con bolsillos laterales. Tela resistente.',
                'price'       => 16000,
                'stock'       => 9,
                'talles'      => 'S,M,L,XL',
                'image'       => 'pantalon4.jpg',
                'images'      => ['pantalon4.jpg', 'pantalon4,2.jpg'],
                'category_id' => $pantId,
                'active'      => true,
            ],
            [
                'name'        => 'Pantalón Chino',
                'description' => 'Pantalón chino de corte slim. Versátil para toda ocasión.',
                'price'       => 13500,
                'stock'       => 11,
                'talles'      => 'S,M,L,XL,XXL',
                'image'       => 'pantalon5.jpg',
                'images'      => ['pantalon5.jpg', 'pantalon5,2.jpg'],
                'category_id' => $pantId,
                'active'      => true,
            ],

            // ── Buzos ────────────────────────────────────────────────────────
            [
                'name'        => 'Buzo Zip',
                'description' => 'Buzo con cierre central. Capucha y bolsillos canguro.',
                'price'       => 11500,
                'stock'       => 14,
                'talles'      => 'S,M,L,XL,XXL',
                'image'       => 'buzo2.jpg',
                'images'      => null,
                'category_id' => $buzoId,
                'active'      => true,
            ],
            [
                'name'        => 'Buzo Oversize Blanco',
                'description' => 'Buzo oversize sin capucha. Corte boxy, tela frizada pesada.',
                'price'       => 10500,
                'stock'       => 16,
                'talles'      => 'S,M,L,XL',
                'image'       => 'buzo3.jpeg',
                'images'      => null,
                'category_id' => $buzoId,
                'active'      => true,
            ],

            // ── Camperas ─────────────────────────────────────────────────────
            [
                'name'        => 'Campera Oversize Negra',
                'description' => 'Campera de corte oversize, tela densa. Cierre YKK.',
                'price'       => 28000,
                'stock'       => 8,
                'talles'      => 'S,M,L,XL',
                'image'       => 'campera1.jpg',
                'images'      => null,
                'category_id' => $campId,
                'active'      => true,
            ],
            [
                'name'        => 'Campera Cuero',
                'description' => 'Campera de cuero sintético premium. Forro interior.',
                'price'       => 45000,
                'stock'       => 5,
                'talles'      => 'S,M,L,XL',
                'image'       => 'campera2.jpg',
                'images'      => null,
                'category_id' => $campId,
                'active'      => true,
            ],
            [
                'name'        => 'Campera Denim',
                'description' => 'Campera de denim lavado. Corte clásico, botones metálicos.',
                'price'       => 22000,
                'stock'       => 10,
                'talles'      => 'XS,S,M,L,XL',
                'image'       => 'campera3.jpg',
                'images'      => null,
                'category_id' => $campId,
                'active'      => true,
            ],
            [
                'name'        => 'Campera Bomber',
                'description' => 'Campera bomber con elásticos en puños y cintura.',
                'price'       => 32000,
                'stock'       => 7,
                'talles'      => 'S,M,L,XL',
                'image'       => 'campera4.jpg',
                'images'      => null,
                'category_id' => $campId,
                'active'      => true,
            ],
            [
                'name'        => 'Campera Técnica',
                'description' => 'Campera técnica impermeable. Capucha ajustable, costuras selladas.',
                'price'       => 38000,
                'stock'       => 6,
                'talles'      => 'S,M,L,XL',
                'image'       => 'campera5.webp',
                'images'      => ['campera5.webp', 'campera5,2.webp'],
                'category_id' => $campId,
                'active'      => true,
            ],
            [
                'name'        => 'Campera Impermeable',
                'description' => 'Campera de lluvia ultraliviana. Plegable, bolsillo frontal.',
                'price'       => 34000,
                'stock'       => 8,
                'talles'      => 'XS,S,M,L,XL',
                'image'       => 'campera6.webp',
                'images'      => ['campera6.webp', 'campera6,2.webp'],
                'category_id' => $campId,
                'active'      => true,
            ],
            [
                'name'        => 'Campera Premium',
                'description' => 'Campera de temporada, exterior técnico y forro polar. Diseño exclusivo.',
                'price'       => 55000,
                'stock'       => 4,
                'talles'      => 'S,M,L,XL',
                'image'       => 'campera7.jpg',
                'images'      => ['campera7.jpg', 'campera7,2.webp', 'campera7,3.jpg'],
                'category_id' => $campId,
                'active'      => true,
            ],
            [
                'name'        => 'Campera Básica',
                'description' => 'Campera esencial de la colección. Sin capucha, corte recto.',
                'price'       => 19000,
                'stock'       => 12,
                'talles'      => 'S,M,L,XL,XXL',
                'image'       => 'campera8.webp',
                'images'      => null,
                'category_id' => $campId,
                'active'      => true,
            ],
        ];

        foreach ($nuevos as $data) {
            Product::create($data);
        }
    }
}

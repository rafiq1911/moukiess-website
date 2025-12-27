<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing products to avoid duplicates
        Product::truncate();
        
        $products = [
            [
                'name' => 'Chocolate Chip Cookies',
                'description' => 'Cookies klasik dengan chocolate chip premium yang lumer di mulut. Sempurna untuk menemani waktu santai Anda!',
                'price' => 35000,
                'category' => 'Classic',
                'stock' => 50,
                'image' => 'chocolate-chip.jpg',
            ],
            [
                'name' => 'Red Velvet Cookies',
                'description' => 'Cookies mewah dengan rasa red velvet yang lembut dan cream cheese yang creamy. Perpaduan sempurna!',
                'price' => 45000,
                'category' => 'Premium',
                'stock' => 30,
                'image' => 'red-velvet.jpg',
            ],
            [
                'name' => 'Matcha Green Tea Cookies',
                'description' => 'Cookies dengan matcha asli dari Jepang. Rasa yang unik dan menyegarkan dengan sentuhan manis yang pas.',
                'price' => 42000,
                'category' => 'Premium',
                'stock' => 40,
                'image' => 'matcha.jpg',
            ],
            [
                'name' => 'Double Chocolate Cookies',
                'description' => 'Untuk pecinta cokelat sejati! Cookies cokelat dengan dark chocolate chunks yang melimpah.',
                'price' => 38000,
                'category' => 'Classic',
                'stock' => 45,
                'image' => 'double-chocolate.jpg',
            ],
            [
                'name' => 'Oatmeal Raisin Cookies',
                'description' => 'Cookies sehat dengan oatmeal dan kismis pilihan. Cocok untuk sarapan atau camilan sehat.',
                'price' => 32000,
                'category' => 'Healthy',
                'stock' => 35,
                'image' => 'oatmeal-raisin.jpg',
            ],
            [
                'name' => 'Peanut Butter Cookies',
                'description' => 'Cookies dengan selai kacang yang creamy dan gurih. Tekstur renyah di luar, lembut di dalam.',
                'price' => 36000,
                'category' => 'Classic',
                'stock' => 40,
                'image' => 'peanut-butter.jpg',
            ],
            [
                'name' => 'Rainbow Sprinkles Cookies',
                'description' => 'Cookies colorful dengan taburan rainbow sprinkles yang ceria. Favorit anak-anak!',
                'price' => 33000,
                'category' => 'Fun',
                'stock' => 60,
                'image' => 'rainbow-sprinkles.jpg',
            ],
            [
                'name' => 'Cookies & Cream',
                'description' => 'Kombinasi cookies dengan cream filling ala Oreo. Rasa yang familiar dan selalu disukai!',
                'price' => 40000,
                'category' => 'Premium',
                'stock' => 35,
                'image' => 'cookies-cream.jpg',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

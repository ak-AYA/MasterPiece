<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('services')->insert([
            [
                'name' => 'Cleaning Windows',
                'description' => 'Cleaning windows - glass & frames',
                'image' => 'https://pngtree.com/freepng/eco-friendly-cleaning-service_3607444.html', // Path to the image
                'duration' => '2 hours', 
                'price' => 30.00, 
                'provider_id' => 1, 
            ],
            [
                'name' => 'Cleaning carpits',
                'description' => 'Cleaning carpits - 2carpits - 3m * 4m (or whats equivalent)',
                'image' => '/images/seo_optimization.jpg',
                'duration' => '3 hours',
                'price' => 80.00,
                'provider_id' => 2,
            ],
          
        ]);
    }
}

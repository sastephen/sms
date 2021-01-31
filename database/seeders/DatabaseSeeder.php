<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Sku;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Stock::factory(25)->create();
        Sku::factory(20)->create();
        Category::factory(10)->create();

        User::factory()->create([
            "name" => "Admin",
            "email" => "admin@mail.com"
        ]);
    }
}

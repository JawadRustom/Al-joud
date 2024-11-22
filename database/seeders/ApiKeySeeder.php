<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class ApiKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the key already exists (optional, for idempotency)
        if (!config('app.api_key')) {  // Adjust this based on how you store the API key
            Artisan::call('apikey:generate', [
                'name' => 'key1',  // Adjust based on your command signature
            ]);
        }
    }
}

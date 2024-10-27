<?php

namespace Database\Seeders;

use App\Enums\RoleTypeEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => RoleTypeEnum::Admin->value]);
        Role::create(['name' => RoleTypeEnum::User->value]);
    }
}

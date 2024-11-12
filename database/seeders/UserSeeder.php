<?php

namespace Database\Seeders;

use App\Enums\RoleTypeEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the admin user and assign the Admin role
        User::factory()->create([
            'first_name' => 'Admin',
            'sur_name' => 'Admin',
            'email' => 'admin@admin.com',
        ])->assignRole(RoleTypeEnum::Admin->value);

//        // Create 10 regular users and assign the random role to each
//        $userCount = User::all()->count();
//        User::factory()
//            ->count(10)
//            ->state(new Sequence(
//                fn($sequence) => [
//                    'first_name' => "User" . ($sequence->index + 1),
//                    'sur_name' => "User",
//                    'email' => "user" . ($sequence->index + 1) . "@user.com",
//                ]
//            ))
//            ->create()->each(function ($user) {
//                // Retrieve roles excluding 'Admin' and convert to an array
//                $roles = Role::query()->where('name', '!=', RoleTypeEnum::Admin->value)
//                    ->pluck('name')
//                    ->toArray();
//                // Get a random role from the array
//                $randomRole = $roles[array_rand($roles)];
//                $user->assignRole($randomRole);
//            });
        // Create Users
        User::factory()
            ->count(5)
            ->state(new Sequence(
                fn($sequence) => [
                    'first_name' => "User" . ($sequence->index + 1),
                    'sur_name' => "User",
                    'email' => "user" . ($sequence->index + 1) . "@user.com",
                ]
            ))->create()->assignRole(RoleTypeEnum::User->value);
        // Create teacher user
        User::factory()
            ->count(5)
            ->state(new Sequence(
                fn($sequence) => [
                    'first_name' => "Teacher" . ($sequence->index + 1),
                    'sur_name' => "Teacher",
                    'email' => "Teacher" . ($sequence->index + 1) . "@Teacher.com",
                ]
            ))->create()->assignRole(RoleTypeEnum::Teacher->value);
    }
}

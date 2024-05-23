<?php

namespace Database\Seeders;

use App\Models\{User, Product, Category};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        $jamie = User::create([
            'name' => 'Jamie Anacleto',
            'email' => 'jamie@gmail.com',
            'password' => Hash::make('123456'),
            'email_verified_at' => now(),
        ]);

        Category::create([
            'name' => 'Household'
        ]);

        Category::create([
            'name' => 'Electronics'
        ]);

        Category::create([
            'name' => 'Automotive'
        ]);

        Category::create([
            'name' => 'Gardening'
        ]);

        Category::create([
            'name' => 'Food Items'
        ]);

        Product::factory(100)->create()->each(function (Product $product) {
            $product->categories()->attach(rand(1, 5));
        });

        Role::create([
            'name' => 'Administrator'
        ])->permissions()->createMany([
                    ['name' => 'create product'],
                    ['name' => 'update product'],
                    ['name' => 'delete product'],
                    ['name' => 'create category'],
                    ['name' => 'update category'],
                    ['name' => 'delete category'],
                    ['name' => 'user management'],
                ]);

        Permission::create(['name' => 'change password']);

        Role::create([
            'name' => 'User'
        ])->syncPermissions(
                ['name' => 'create product'],
                ['name' => 'update product'],
                ['name' => 'delete product'],
                ['name' => 'create category'],
                ['name' => 'update category'],
                ['name' => 'delete category'],
                ['name' => 'change password'],
            );

        $jamie->assignRole('Administrator');

    }
}

<?php

namespace Database\Seeders;

use App\Models\AdminModel;
use App\Models\ProductModel;
use App\Models\RoleModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminModel::truncate();
        RoleModel::truncate();

        RoleModel::insert([
            [
                'id' => 1,
                'name' => 'Master'
            ],
            [
                'id' => 2,
                'name' => 'Admin'
            ]
        ]);

        AdminModel::insert([
            [
                'roles_id' => 1,
                'name' => 'Samsul',
                'email' => 'samsul@mail.com',
                'password' => '123456',
            ],
            [
                'roles_id' => 1,
                'name' => 'Samsul 2',
                'email' => 'samsul@mail.com',
                'password' => '123456',
            ],
            [
                'roles_id' => 1,
                'name' => 'Samsul 3',
                'email' => 'samsul@mail.com',
                'password' => '123456',
            ],
            [
                'roles_id' => 2,
                'name' => 'Jihan',
                'email' => 'samsul@mail.com',
                'password' => '123456',
            ],
            [
                'roles_id' => 2,
                'name' => 'Jihan 2',
                'email' => 'samsul@mail.com',
                'password' => '123456',
            ],
        ]);

        ProductModel::insert([
            [
                'name' => 'Product',
                'status' => 1,
                'price' => 20000
            ],
            [
                'name' => 'Product',
                'status' => 1,
                'price' => 20000
            ],
            [
                'name' => 'Product',
                'status' => 1,
                'price' => 20000
            ],
            [
                'name' => 'Product',
                'status' => 1,
                'price' => 20000
            ],
            [
                'name' => 'Product',
                'status' => 1,
                'price' => 20000
            ],
            [
                'name' => 'Product',
                'status' => 1,
                'price' => 20000
            ],
            [
                'name' => 'Product',
                'status' => 1,
                'price' => 20000
            ],
            [
                'name' => 'Product',
                'status' => 1,
                'price' => 20000
            ],
            [
                'name' => 'Product',
                'status' => 1,
                'price' => 20000
            ],
            [
                'name' => 'Product',
                'status' => 1,
                'price' => 20000
            ],
        ]);
    }
}
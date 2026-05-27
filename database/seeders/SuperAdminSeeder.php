<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::insert("INSERT INTO users (company_id, role_id, name, email, password, created_at, updated_at) VALUES (NULL, 1, 'Super Admin', 'superadmin@gmail.com', ?, NOW(), NOW())", [Hash::make('password')]);
    }
}
<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
public function run(): void
{
    // Pastikan role 'admin' tersedia
    $adminRole = Role::firstOrCreate(['name' => 'admin']);

    // Cek jika user sudah ada
    $super_admin = User::where('email', 'superadmin@local.com')->first();

    if (empty($super_admin)) {
        $super_admin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@local.com',
            'password' => Hash::make('12345678'),
        ]);
    }

    // Assign role 'admin' ke user
    if (!$super_admin->hasRole('admin')) {
        $super_admin->assignRole($adminRole);
    }
}
}
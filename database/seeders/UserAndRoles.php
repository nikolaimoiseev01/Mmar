<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserAndRoles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_permissions')->truncate();
        DB::table('permissions')->truncate();
        $email = ENV('APP_ENV') == ('local') ? 'admin@mail.ru' : ENV('ADMIN_EMAIL');
        $password = ENV('APP_ENV') == ('local') ? '12345678' : ENV('ADMIN_PASSWORD');
        $admin = User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'age' => 30,
            'telephone' => '12345678',
            'email' => $email,
            'email_verified_at' => now(),
            'password' => Hash::make($password),
            'remember_token' => Str::random(10),
        ]);

        Role::create(['name' => 'brand']);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

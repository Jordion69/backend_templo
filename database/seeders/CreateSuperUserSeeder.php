<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateSuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            // 'name' => 'Superuser',
            // 'email' => 'superuser@gmail.com',
            // 'password' => 'Password.1'
            'name' => 'Administrador',
            'email' => 'templodelmetal1969@gmail.com',
            'password' => 'ffft2mpl4d2lm2t@l'
        ]);
        $role = Role::create(['name' => 'administrador']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}

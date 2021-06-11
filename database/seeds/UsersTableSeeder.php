<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = User::create([
           'username' => 'Sergio Penagos',
           'email' => 'tipouno@dae.com',
           'password' => Hash::make('password')
       ]);
       $user2 = User::create([
        'username' => 'Hardik Savani',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123456')
        ]);

       $role = Role::create(['name'=>'Admin']);
       $role2 = Role::create(['name'=>'Operador']);


       $permissions = Permission::pluck('id','id')->all();
       $role->syncPermissions($permissions);
       $user->assignRole([$role->id]);
        $user2->assignRole([$role2->id]);
    }
}

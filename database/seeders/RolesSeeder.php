<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['name' => 'super_admin','guard_name'=>'web'],
            ['name' => 'Denominational Leader','guard_name'=>'web'],
            ['name' => 'Regional Leader','guard_name'=>'web'],
            ['name' => 'Member','guard_name'=>'web'],
            ['name' => 'Church Planter','guard_name'=>'web'],
        ]);
        $user = \App\Models\User::find(1);
        $user->assignRole('super_admin');
    }
}

<?php

namespace Database\Seeders;

use App\enums\Role as RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Enum;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $adminPermissions = [
            Permission::create(['name' => 'view banners']),
            Permission::create(['name' => 'create banner']),
            Permission::create(['name' => 'delete banners']),
            Permission::create(['name' => 'edit banners']),

            Permission::create(['name' => 'view restaurant categories']),
            Permission::create(['name' => 'create restaurant category']),
            Permission::create(['name' => 'delete restaurant categories']),
            Permission::create(['name' => 'edit restaurant categories']),

            Permission::create(['name' => 'view food categories']),
            Permission::create(['name' => 'create food category']),
            Permission::create(['name' => 'delete food categories']),
            Permission::create(['name' => 'edit food categories']),

            Permission::create(['name' => 'view discount']),
            Permission::create(['name' => 'create discount']),
            Permission::create(['name' => 'delete discounts']),
        ];

        $sellerPermissions = [
            Permission::create(['name' => 'view restaurant']),
            Permission::create(['name' => 'create restaurant']),
            Permission::create(['name' => 'delete restaurant']),
            Permission::create(['name' => 'edit restaurant']),

            Permission::create(['name' => 'view addresses']),
            Permission::create(['name' => 'create address']),
            Permission::create(['name' => 'delete addresses']),
            Permission::create(['name' => 'edit addresses']),

            Permission::create(['name' => 'view schedules']),
            Permission::create(['name' => 'create schedule']),
            Permission::create(['name' => 'delete schedules']),
            Permission::create(['name' => 'edit schedules']),

            Permission::create(['name' => 'view foods']),
            Permission::create(['name' => 'create food']),
            Permission::create(['name' => 'delete foods']),
            Permission::create(['name' => 'edit foods']),

            Permission::create(['name' => 'assign discount']),
            Permission::create(['name' => 'assign food party']),
            Permission::create(['name' => 'delete food party']),

            Permission::create(['name' => 'view orders']),
            Permission::create(['name' => 'view reports']),
            Permission::create(['name' => 'view comments']),
        ];
        foreach (RoleEnum::getValues() as $role) {
            $$role = Role::create(['name'=>$role]);
        }
        $admin->givePermissionTo($adminPermissions);
        $seller->givePermissionTo($sellerPermissions);
        $superAdmin = User::factory()->create([
            'name' => 'علی زیبایی',
            'email' => 'alizibaie1380@gmail.com',
            'password' => Hash::make(123456),
        ]);
        $superAdmin->assignRole($admin);
    }

}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // Admin Permissions
            ['name' => 'view subscriptions', 'type' => 'owner'],
            ['name' => 'add subscriptions', 'type' => 'owner'],
            ['name' => 'edit subscriptions', 'type' => 'owner'],
            ['name' => 'delete subscriptions', 'type' => 'owner'],
            ['name' => 'view packages', 'type' => 'owner'],
            ['name' => 'add packages', 'type' => 'owner'],
            ['name' => 'edit packages', 'type' => 'owner'],
            ['name' => 'delete packages', 'type' => 'owner'],
            ['name' => 'view features', 'type' => 'owner'],
            ['name' => 'add features', 'type' => 'owner'],
            ['name' => 'edit features', 'type' => 'owner'],
            ['name' => 'delete features', 'type' => 'owner'],
            ['name' => 'view advertisements', 'type' => 'owner'],
            ['name' => 'add advertisements', 'type' => 'owner'],
            ['name' => 'edit advertisements', 'type' => 'owner'],
            ['name' => 'delete advertisements', 'type' => 'owner'],
            ['name' => 'view clients', 'type' => 'owner'],
            ['name' => 'add clients', 'type' => 'owner'],
            ['name' => 'edit clients', 'type' => 'owner'],
            ['name' => 'delete clients', 'type' => 'owner'],
            ['name' => 'view fields', 'type' => 'owner'],
            ['name' => 'add fields', 'type' => 'owner'],
            ['name' => 'edit fields', 'type' => 'owner'],
            ['name' => 'delete fields', 'type' => 'owner'],

            // Client Permissions
            ['name' => 'view halls', 'type' => 'client'],
            ['name' => 'add halls', 'type' => 'client'],
            ['name' => 'edit halls', 'type' => 'client'],
            ['name' => 'delete halls', 'type' => 'client'],
            ['name' => 'view services', 'type' => 'client'],
            ['name' => 'add services', 'type' => 'client'],
            ['name' => 'edit services', 'type' => 'client'],
            ['name' => 'delete services', 'type' => 'client'],

            // Both Permissions
            ['name' => 'view dashboard', 'type' => 'both'],
            ['name' => 'view expenses', 'type' => 'both'],
            ['name' => 'add expenses', 'type' => 'both'],
            ['name' => 'edit expenses', 'type' => 'both'],
            ['name' => 'delete expenses', 'type' => 'both'],
            ['name' => 'view revenues', 'type' => 'both'],
            ['name' => 'add revenues', 'type' => 'both'],
            ['name' => 'edit revenues', 'type' => 'both'],
            ['name' => 'delete revenues', 'type' => 'both'],
            ['name' => 'view reports', 'type' => 'both'],
            ['name' => 'add reports', 'type' => 'both'],
            ['name' => 'edit reports', 'type' => 'both'],
            ['name' => 'delete reports', 'type' => 'both'],
            ['name' => 'view users', 'type' => 'both'],
            ['name' => 'add users', 'type' => 'both'],
            ['name' => 'edit users', 'type' => 'both'],
            ['name' => 'delete users', 'type' => 'both'],
            ['name' => 'view settings', 'type' => 'both'],
            ['name' => 'edit settings', 'type' => 'both'],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}

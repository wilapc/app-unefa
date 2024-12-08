<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleUsers extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $rolest = Role::create(['name' => 'student']);
    $roledel = Role::create(['name' => 'delegate']);
    $rolecoor = Role::create(['name' => 'coordinator']);
    $rolesa = Role::create(['name' => 'super-admin']);

    Permission::create(['name' => 'whatsappGroups'])->syncRoles([$rolest, $roledel]);
    Permission::create(['name' => 'add link'])->syncRoles([$roledel, $rolecoor]);
  }
}

<?php

namespace Database\Seeders;

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = \DB::connection('old_mysql')->table('permissions')->get();

        foreach ($items as $item) {
            Permission::create([
                'id' => $item->id,
                'name' => $item->name,
            ]);
        }
    }
}
<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProductSeeder::class,
            OrderSeeder::class,
            OrderItemSeeder::class,
            RoleSeeder::class,
            UserRoleSeeder::class
        ]);
    }
}

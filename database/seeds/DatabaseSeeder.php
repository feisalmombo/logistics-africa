<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BudgetExpendituresTableSeeder::class);
        $this->call(KindProcurementsTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
    }
}

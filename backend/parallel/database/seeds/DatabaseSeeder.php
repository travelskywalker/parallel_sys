<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SchoolsTableSeeder::class);
        $this->call(TeachersTableSeeder::class);
        $this->call(ClassesTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        // $this->call(AccessesTableSeeder::class);
    }
}

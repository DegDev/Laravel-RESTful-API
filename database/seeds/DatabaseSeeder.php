<?php

use App\User;
use App\Group;
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
        User::truncate();
        Group::truncate();

        $groups = factory('App\Group', 10)->create();

        foreach ($groups as $group) {
            factory('App\User', 5)->create(['group_id' => $group->id]);
        }
    }
}
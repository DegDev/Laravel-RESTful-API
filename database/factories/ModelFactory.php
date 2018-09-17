<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'group_id' => function(){
            return factory('App\Group')->create()->id;
        },        
        'email' => $faker->unique()->safeEmail,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'state' =>  (bool) rand(0, 1),
        'created_at' => new \DateTime('now')
        ];
});

$factory->define(App\Group::class, function (Faker $faker) {
    return [        
        'name' => $faker->unique()->word
    ];
});

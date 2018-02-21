<?php

use Faker\Generator as Faker;

$factory->define(App\Classes::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'school_id' => $faker->randomDigit(10),
        'notes' => $faker->text,
    ];
});

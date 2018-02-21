<?php

use Faker\Generator as Faker;

$factory->define(App\Section::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'timefrom' => $faker->time,
        'timeto' => $faker->time,
        'room' =>$faker->ramdomDigit(),
        'teacher_id' => $faker->randomDigit(10),
        'studentlimit' => $faker->randomDigit,
        'classes_id' => $faker->randomDigit(10)
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\Teacher::class, function (Faker $faker) {
    return [
    	'school_id' => $faker->randomDigit(10),
        'teachernumber' => $faker->randomDigit,
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'middlename' => $faker->lastname,
        'image' => $faker->imageUrl,
    ];
});

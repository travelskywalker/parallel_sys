<?php

use Faker\Generator as Faker;

$factory->define(App\School::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'title1' => $faker->text,
        'admin' => $faker->name,
        'address' => $faker->address,
        'city' => $faker->city,
        'email' => $faker->unique()->safeEmail,
        'phonenumber' => $faker->randomDigit,
        'mobilenumber' => $faker->randomDigit,
        'logo' => $faker->imageUrl,
    ];
});

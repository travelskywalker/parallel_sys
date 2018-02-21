<?php

use Faker\Generator as Faker;

$factory->define(App\Student::class, function (Faker $faker) {
    return [
        'studentnumber' => $faker->randomDigit,
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'middlename' => $faker->lastname,
        'gender'=> 'male',
        'birthdate' => $faker->date,
        'address' => $faker->address,
        'fathersname' => $faker->name,
        'mothersname' => $faker->name,
        'guardianname' => $faker->name,
        'emergencycontactnumber' => $faker->randomDigit,
        'nationality' =>'filipino',
        'religion' => 'christian',
        'image' => $faker->imageUrl
    ];
});

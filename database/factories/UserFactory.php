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
    static $password;

    return [
        'name'            => $faker->name,
        'email'           => $faker->unique()->safeEmail,
        'password'        => $password ?: $password = bcrypt('secret'),
        'remember_token'  => str_random(10),
    ];
});


$factory->define(App\Business::class, function (Faker $faker) {
     
    return [
        'name'    => $faker->company,
        'email'   => $faker->unique()->safeEmail,
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'phone'   => $faker->phoneNumber,
        'address' => $faker->address,
    ];
});


$factory->define(App\Office::class, function (Faker $faker) {
     
    return [
        'name'        => $faker->jobTitle,
        'phone'       => $faker->phoneNumber,
        'email'       => $faker->unique()->safeEmail,
        'business_id' => function () {
            return factory('App\Business')->create()->id;
        },
        'address'     => $faker->address,
        'latitude'    => $faker->latitude($min = -90, $max = -20),
        'longitude'   => $faker->longitude($min = -90, $max = -20),
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
     
    return [
        'name'          => $faker->name,
        'office_id'     => function () {
            return factory('App\Office')->create()->id;
        },
        'price'         => $faker->randomFloat(3,0,10),
        'description'   => $faker->text(120),
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\RoleType::class, function (Faker $faker) {
    return [
        'name'  => $faker->text(200)
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\TeamRole::class, function (Faker $faker) {
    return [
        'name' => 'user'
    ];
});
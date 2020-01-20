<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\URLShortener;
use Faker\Generator as Faker;

$factory->define(URLShortener::class, function (Faker $faker) {
    return [
        'long_url'=> $faker->url,
        'short_url'=> $faker->url,
    ];
});

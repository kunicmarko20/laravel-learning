<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'quantity' => $faker->numberBetween(1, 10),
        'status' => $faker->randomElement([\App\Product::PRODUCT_AVAILABLE, \App\Product::PRODUCT_UNAVAILABLE]),
        'image' => random_int(1, 3) . '.jpg',
        'seller_id' => \App\User::all()->random()->id
    ];
});

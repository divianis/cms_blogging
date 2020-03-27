<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(3),
        'description'=>$faker->paragraph(4),
        'content'=>$faker->paragraph(4),
        'publised_at'=>$faker->now()
    ];
});

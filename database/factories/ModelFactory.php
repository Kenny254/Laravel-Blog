<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/*@var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('password'),
        'remember_token' => str_random(10),
    ];
}); 


$factory->define(App\Post::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'slug' => $faker->slug(),
        'category_id' => \App\Category::all()->random()->id,
        'body' => $faker->realText($maxNbChars = 500),
        'user_id' => App\User::all()->random()->id,
        'image' => $faker->image('public/images/posts',1920,1080, null, false),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word(),
    ];
});

$factory->define(App\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word(),
    ];
});


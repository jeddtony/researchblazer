<?php

use App\Project;
use App\User;
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
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Tag::class, function (Faker $faker) {
//    dd('I am tired');
    return[
        'name' => $faker->name,
    ];
});

$factory->define(App\Project::class, function(Faker $faker){
    return[
        'title' => $faker->word,
        'user_id' => User::all()->random()->id,
        'tag_id'=> rand(1, 50),
        'link_to_storage' => $faker->url,
        'approved' => rand(0,1),
        'number_of_pages' => rand(0, 70),
        'number_of_downloads' => rand(1, 50),
        'abstract' => $faker->paragraph,
    ];
});

$factory->define(App\Chapter::class, function(Faker $faker){
    return[
        'project_id' => Project::all()->random()->id,
        'chapter' => rand(1, 7),
        'title' => $faker->title,
        'link_to_storage' => $faker->url,
        'number_of_pages' => rand(1, 40),
    ];
});
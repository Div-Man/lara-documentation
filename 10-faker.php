<?php

/* faker - модель для быстрого заполенеия БД информацией*/

<?php

use Faker\Generator as Faker;


/* Здесь указывается модель, 
 * в которой будет взята таблица из бд
 * и будет работа с ней
 */

$factory->define(App\Services\Image::class, function ($faker) {
    return [
        'description' => $faker->title,
        'image' => $faker->title,
        'id_user' => function () {
        return App\User::all()->random()->id;
        }
    ];
});

/*
 * И потом можно в роуте вызвать 
 */

factory(App\Services\Image::class, 5)->create()

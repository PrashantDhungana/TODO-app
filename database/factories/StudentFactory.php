<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Students;
use Faker\Generator as Faker;

$factory->define(Students::class, function (Faker $faker) {
    return [
        	'name'=>("Mr.".$faker->firstNameMale),
        	'phone_no'=>"98".$faker->numberBetween(00000000,99999999),
        	'address'=>$faker->address,
    ];
});

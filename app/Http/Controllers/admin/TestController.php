<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;
use App\User;
use App\Activity;

class TestController extends Controller
{
    public function alert()
    {
        Alert::warning('Warning Title', 'Warning Message');
        return back();
    }

    public function create_dummy_user()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $num = array('06', '08', '09');
            $major =  array('SE', 'CS', 'FS');
            $num1 = array_rand($num);
            $major1 = array_rand($major);
            $num = $num[$num1];
            $major = $major[$major1];

            User::create([
                'first_name' => $faker->firstName('male' | 'female'),
                'last_name' => $faker->lastName,
                'tel' => $num . $faker->ean8,
                'major' => $major,
                'email' => $faker->email,
                'password' => Hash::make('qqqqwwww'),
                'user_image' => 'profile-default.jpg',
            ]);
        }
        Alert::toast('Create User Data Successfully', 'success');
        return redirect('/admin/create_dummy_activity')->with('status', 'Please wait to create activity data.');
    }

    public function create_dummy_activity()
    {
        if (session('status')) {
            Alert::success(session('status'));
        }

        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            Activity::create([
                'activity_name' => $faker->userName,
                'activity_address' => $faker->address,
                'activity_date' => $faker->date($format = 'Y-m-d', $min = 'now'),
                'activity_time' => $faker->time($format = 'H:i:s', $min = 'now'),
                'hour' => $faker->randomDigit,
                'activity_detail' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'activity_image' => $faker->userName,
            ]);
        }
        Alert::toast('Create User Data Successfully', 'success');
    }
}

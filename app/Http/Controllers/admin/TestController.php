<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;
use App\User;
use App\Activity;

class TestController extends Controller
{

    //give private declaration
    private $numOfLoop;
    public function __construct()
    {
        $this->numOfLoop = 30;
    }

    public function alert()
    {
        Alert::warning('Warning Title', 'Warning Message');
        return back();
    }

    public function create_dummy_user()
    {
        if (session('success')) {
            Alert::success(session('success'));
        }
        $faker = Factory::create();

        $numOfLoop = $this->numOfLoop;
        for ($i = 0; $i < $numOfLoop; $i++) {
            $num = array('06', '08', '09');
            $major =  array('1', '2', '3');
            $num1 = array_rand($num);
            $major1 = array_rand($major);
            $num = $num[$num1];
            $major = $major[$major1];
            $userData = array(
                'first_name' => $faker->firstName('male' | 'female'),
                'last_name' => $faker->lastName,
                'tel' => $num . $faker->ean8,
                'major_id' => $major,
                'email' => $faker->email,
                'password' => Hash::make('qqqqwwww'),
                'user_image' => 'profile-default.jpg',
            );

            $exists = User::where('email', '=', $userData['email'])->first();

            if (!$exists) {
                User::create($userData);
            }
        }
        return redirect('admin/create_dummy_activity');
    }

    public function create_dummy_activity()
    {
        $faker = Factory::create();

        $numOfLoop = $this->numOfLoop;
        for ($i = 0; $i < $numOfLoop; $i++) {
            $activityData = array(
                'activity_name' => $faker->userName,
                'activity_address' => $faker->address,
                'activity_date' => $faker->date($format = 'Y-m-d', $min = 'now'),
                'activity_time' => $faker->time($format = 'H:i:s', $min = 'now'),
                'activity_todate' => $faker->date($format = 'Y-m-d', $min = 'now'),
                'activity_totime' => $faker->time($format = 'H:i:s', $min = 'now'),
                'hour' => $faker->randomDigit,
                'activity_detail' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'activity_image' => 'banner-01.jpg',
            );

            $exists = Activity::where('activity_name', '=', $activityData['activity_name'])->first();

            if (!$exists) {
                Activity::create($activityData);
            }
        }
        Alert::success('Create Dummy Data Successfully', 'success');
        return redirect('admin/home');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Activity;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('success')) {
            Alert::success(session('success'));
        }
        if (session('error')) {
            Alert::error(session('error'));
        }

        $activity = Activity::get()->count();
        $user = User::get()->count();
        $countData = [
            'activity' => $activity,
            'user' => $user,
        ];

        $new_activity = Activity::orderBy('activity_id', 'DESC')->paginate(3);
        // dd($new_activity);
        return view('admin.dashboard', compact('countData', 'new_activity'));
    }
}

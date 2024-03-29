<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Alert;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
        $user = User::where('user_id', '=', Auth::user()->user_id)->first();
        // dd($user->role, $user->major);
        return view('admin.user-profile-edit', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'student_id' => 'required|string|max:10',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'tel' => 'required',
                'major' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
            ]
        );

        $user = User::where('user_id', '=', Auth::user()->user_id)->first();

        if ($request->user_image == null) {
            if ($user) {
                $attr['student_id'] = $request->get('student_id');
                $attr['first_name'] = $request->get('first_name');
                $attr['last_name'] = $request->get('last_name');
                $attr['tel'] = $request->get('tel');
                $attr['major_id'] = $request->get('major');
                $attr['email'] = $request->get('email');
                $user->update($attr);
                return redirect('admin/home')->with('success', 'อัปเดตสำเร็จ');
            }
            return redirect()->back()->withInput($request->input())->with('error', 'อัพเดทล้มเหลว!');
        }

        $FileImagerun = $request->user_image;
        $imageName = null;

        if ($FileImagerun != null) {
            $imageName = time() . '.' . $FileImagerun->getClientOriginalExtension();
            $FileImagerun->move(public_path('images/profile'), $imageName);
        }

        if ($user) {
            $attr['first_name'] = $request->get('first_name');
            $attr['last_name'] = $request->get('last_name');
            $attr['tel'] = $request->get('tel');
            $attr['major'] = $request->get('major');
            $attr['email'] = $request->get('email');
            $attr['user_image'] = $imageName;
            $user->update($attr);

            return redirect('admin/home')->with('success', 'อัปเดตสำเร็จ');
        }
        return redirect()->back()->withInput($request->input())->with('error', 'อัพเดทล้มเหลว!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

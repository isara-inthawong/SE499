<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Alert;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
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
        $users = User::paginate(10);
        return view('admin.users', compact('users'));
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
        $user = User::find($id);
        return view('admin.user-edit', compact('user'));
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
                'role_id' => 'required',
                'email' => 'required|string|email|max:255',
            ]
        );
        $users = User::where('user_id', '=', $id)->first();

        $FileImage = $request->user_image;
        $imageName = null;

        if ($FileImage != null) {
            $imageName = time() . '.' . $FileImage->getClientOriginalExtension();
            $FileImage->move(public_path('images/profile'), $imageName);
        }

        if ($request->user_image == null) {
            $attr['student_id'] = $request->get('student_id');
            $attr['first_name'] = $request->get('first_name');
            $attr['last_name'] = $request->get('last_name');
            $attr['tel'] = $request->get('tel');
            $attr['major_id'] = $request->get('major');
            $attr['role_id'] = $request->get('role_id');
            $attr['email'] = $request->get('email');
            $users->update($attr);

            return redirect('admin/users')->with('success', 'สร้างสำเร็จ');
        } else {
            $attr['student_id'] = $request->get('student_id');
            $attr['first_name'] = $request->get('first_name');
            $attr['last_name'] = $request->get('last_name');
            $attr['tel'] = $request->get('tel');
            $attr['major_id'] = $request->get('major');
            $attr['role_id'] = $request->get('role_id');
            $attr['email'] = $request->get('email');
            $attr['user_image'] = $imageName;
            $users->update($attr);

            return redirect('admin/users')->with('success', 'อัปเดตสำเร็จ');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect('admin/users')->with('success', 'ลบสำเร็จ');
    }
}

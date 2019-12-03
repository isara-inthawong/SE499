<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use Alert;
use RealRashid\SweetAlert\Facades\Alert;


class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('activity');
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
        $this->validate(
            $request,
            [
                'activity_name' => 'required',
                'activity_detail' => 'required',
                'activity_address' => 'required',
                'activity_datetime' => 'required',
                'activity_image' => 'required',
                'activity_image' => 'required|image|mimes:jpeg,png,jpg|max:15360‬'
            ]
        );

        $FileImagerun = $request->image_map;
        $imageName = null;

        if ($FileImagerun != null) {
            $imageName = time() . '.' . $FileImagerun->getClientOriginalExtension();
            $FileImagerun->move(public_path('images'), $imageName);
        }
        Alert::warning('คุณเคยสร้างกิจกรรมนี้แล้ว!');
        return redirect()->back();
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
        //
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

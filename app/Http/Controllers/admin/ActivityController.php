<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Activity;
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
        if (session('success_message')) {
            Alert::success(session('success_message'));
        }
        return view('admin.activity');
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
                'activity_date' => 'required',
                'activity_time' => 'required',
                'hour' => 'requred|integer|',
                'activity_image' => 'required|image|mimes:jpeg,png,jpg|max:15360‬',
            ]
        );

        $FileImagerun = $request->image_map;
        $imageName = null;

        if ($FileImagerun != null) {
            $imageName = time() . '.' . $FileImagerun->getClientOriginalExtension();
            $FileImagerun->move(public_path('images/activity'), $imageName);
        }

        $activity_name = $request->get('activity_name');
        $exists = Activity::where('activity_name', '=', $activity_name)->first();

        if (!$exists) {
            $dataActivity = array(
                'activity_name' => $activity_name,
                'activity_detail' => $request->get('activity_detail'),
                'activity_address' => $request->get('activity_address'),
                'activity_date' => $request->get('activity_date'),
                'activity_time' => $request->get('activity_time'),
                'hour' => $request->get('hour'),
                'activity_image' => $imageName
            );
            Activity::create($dataActivity);

            return redirect('admin/activity')->withSuccessMessage('สร้างชื่อกิจกรรมวิ่งสำเร็จแล้ว');
        }
        Alert::warning('คุณเคยสร้างชื่อกิจกรรมนี้แล้ว!');

        return redirect()->back()->withInput(input());
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
        $activity = Activity::find($id);
        return view('admin.edi-activity', compact('activities'));
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
                'activity_name' => 'required',
                'activity_detail' => 'required',
                'activity_address' => 'required',
                'activity_date' => 'required',
                'activity_time' => 'required',
                'hour' => 'requred|integer',
                // 'activity_image' => 'required|image|mimes:jpeg,png,jpg|max:15360‬',
            ]
        );

        if ($request->activity_image == null) {
            $exists = Activity::where('activity_id', '=', $id)->first();

            if ((!$exists) || ($exists->activity_id == $id)) {
                $activity = Activity::where('activity_id', '=', $id);

                $attr['activity_name'] = $request->get('activity_name');
                $attr['activity_detail'] = $request->get('activity_detail');
                $attr['activity_address'] = $request->get('activity_address');
                $attr['activity_date'] = $request->get('activity_date');
                $attr['activity_time'] = $request->get('activity_time');
                $attr['hour'] = $request->get('hour');
                $activity->update($attr);

                return redirect('admin/activity')->withSuccessMessage('แก้ไขกิจกรรมสำเร็จแล้ว');
            }
            Alert::warning('คุณเคยสร้างกิจกรรมนี้แล้ว!');
            return redirect()->back()->withInput(input());
        }
        $FileImagerun = $request->activity_image;
        $imageName = null;

        if ($FileImagerun != null) {
            $imageName = time() . '.' . $FileImagerun->getClientOriginalExtension();
            $FileImagerun->move(public_path('images/activity'), $imageName);
        }

        $exists = Activity::where('activity_id', '=', $id)->first();

        if ((!$exists) || ($exists->activity_id == $id)) {
            $activity = Activity::where('activity_id', '=', $activity_id);

            $attr['activity_name'] = $request->get('activity_name');
            $attr['activity_detail'] = $request->get('activity_detail');
            $attr['activity_address'] = $request->get('activity_address');
            $attr['activity_date'] = $request->get('activity_date');
            $attr['activity_time'] = $request->get('activity_time');
            $attr['hour'] = $request->get('hour');
            $attr['activity_image'] = $imageName;
            $activity->update($attr);

            return redirect('admin/activity')->withSuccessMessage('แก้ไขกิจกรรมสำเร็จแล้ว');
        }
        Alert::warning('คุณเคยสร้างกิจกรรมนี้แล้ว!');
        return redirect()->back()->withInput(input());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activity::find($id)->delete();
        return redirect('admin/activity')->withSuccessMessage('ลบข้อมูลสำเร็จแล้ว');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Activity;
use Alert;
use KS\Line\LineNotify;

class ActivityController extends Controller
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
        $activity = Activity::paginate(10);;
        return view('admin.activity', compact('activity'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session('success')) {
            Alert::success(session('success'));
        }
        if (session('error')) {
            Alert::error(session('error'));
        }
        return view('admin.activity-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* line config */
        $token = '7J81Hhjpsw6YhWjJsxNMsZahzgqBexoFMoLoFg7XTvM';
        $ln = new LineNotify($token);

        $this->validate(
            $request,
            [
                'activity_name' => 'required|string',
                'activity_detail' => 'required|string',
                'activity_address' => 'required|string|max:500',
                'activity_date' => 'required|date',
                'activity_time' => 'required',
                'activity_hour' => 'required|integer',
                // 'activity_image' => 'required|image|mimes:jpeg,png,jpg|max:15360‬',
            ]
        );

        $activity_name = $request->get('activity_name');
        $exists = Activity::where('activity_name', '=', $activity_name)->first();

        $FileImage = $request->activity_image;
        $imageName = null;

        if ($FileImage != null) {
            $imageName = time() . '.' . $FileImage->getClientOriginalExtension();
            $FileImage->move(public_path('images/activity'), $imageName);
        }

        if ($request->activity_image == null) {

            if (!$exists) {
                $dataActivity = array(
                    'activity_name' => $activity_name,
                    'activity_detail' => $request->get('activity_detail'),
                    'activity_address' => $request->get('activity_address'),
                    'activity_date' => $request->get('activity_date'),
                    'activity_time' => $request->get('activity_time'),
                    'hour' => $request->get('activity_hour'),
                );
                Activity::create($dataActivity);

                $text = 'กิจกรรม ' . $activity_name
                    . ' วันที่จัดงาน(ปป/ดด/วว) ' . $request->get('activity_date') . ', เวลา ' . $request->get('activity_time') . ' น.'
                    . ', ที่ ' . $request->get('activity_address') . ', รายละเอียด ' . $request->get('activity_detail');
                $ln->send($text); // sent

                return redirect('admin/home')->with('success', 'สร้างสำเร็จ');
            }
            return redirect()->back()->withInput($request->input())->with('error', 'สร้างล้มเหลว! มีชื่อกิจกรรมนี้อยู่แล้ว');
        }

        if (!$exists) {
            $dataActivity = array(
                'activity_name' => $activity_name,
                'activity_detail' => $request->get('activity_detail'),
                'activity_address' => $request->get('activity_address'),
                'activity_date' => $request->get('activity_date'),
                'activity_time' => $request->get('activity_time'),
                'hour' => $request->get('activity_hour'),
                'activity_image' => $imageName
            );
            Activity::create($dataActivity);

            $image_path = './images/activity/' . $imageName; //Line notify allow only jpeg and png file
            $text = 'กิจกรรม ' . $activity_name
                . ' วันที่จัดงาน(ปป/ดด/วว) ' . $request->get('activity_date') . ', เวลา ' . $request->get('activity_time') . ' น.'
                . ', ที่ ' . $request->get('activity_address') . ', รายละเอียด ' . $request->get('activity_detail');
            $ln->send($text, $image_path); // sent

            return redirect('admin/activity')->with('success', 'สร้างสำเร็จ');
        }
        return redirect()->back()->withInput($request->input())->with('error', 'สร้างล้มเหลว! มีชื่อกิจกรรมนี้อยู่แล้ว');
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
        return view('admin.activity-edit', compact('activity'));
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
        /* line config */
        $token = '7J81Hhjpsw6YhWjJsxNMsZahzgqBexoFMoLoFg7XTvM';
        $ln = new LineNotify($token);

        $this->validate(
            $request,
            [
                'activity_name' => 'required|string',
                'activity_detail' => 'required|string',
                'activity_address' => 'required|string|max:500',
                'activity_date' => 'required|date',
                'activity_time' => 'required',
                'activity_hour' => 'required|integer',
            ]
        );

        if ($request->activity_image == null) {
            $exists = Activity::where('activity_id', '=', $id)->first();

            if ((!$exists) || ($exists->activity_id == $id)) {
                $activity = Activity::where('activity_id', '=', $id)->first();

                $attr['activity_name'] = $request->get('activity_name');
                $attr['activity_detail'] = $request->get('activity_detail');
                $attr['activity_address'] = $request->get('activity_address');
                $attr['activity_date'] = $request->get('activity_date');
                $attr['activity_time'] = $request->get('activity_time');
                $attr['hour'] = $request->get('activity_hour');
                $activity->update($attr);

                return redirect('admin/activity')->with('success', 'อัปเดตสำเร็จ');
            }
            return redirect()->back()->withInput($request->input())->with('error', 'การอัพเดทล้มเหลว!');
        }
        $FileImage = $request->activity_image;
        $imageName = null;

        if ($FileImage != null) {
            $imageName = time() . '.' . $FileImage->getClientOriginalExtension();
            $FileImage->move(public_path('images/activity'), $imageName);
        }

        $exists = Activity::where('activity_id', '=', $id)->first();

        if ((!$exists) || ($exists->activity_id == $id)) {
            $activity = Activity::where('activity_id', '=', $id)->first();

            $attr['activity_name'] = $request->get('activity_name');
            $attr['activity_detail'] = $request->get('activity_detail');
            $attr['activity_address'] = $request->get('activity_address');
            $attr['activity_date'] = $request->get('activity_date');
            $attr['activity_time'] = $request->get('activity_time');
            $attr['hour'] = $request->get('activity_hour');
            $attr['activity_image'] = $imageName;
            $activity->update($attr);

            return redirect('admin/activity')->with('success', 'อัปเดตสำเร็จ');
        }
        return redirect()->back()->withInput($request->input())->with('error', 'การอัพเดทล้มเหลว!');
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

        return redirect('admin/activity')->with('success', 'ลบสำเร็จ');
    }
}

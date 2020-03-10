<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Auth;
use App\Activity;
use App\History;

class JoinActivityController extends Controller
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
        $activity = Activity::orderBy('activity_id', 'desc')->get();
        return view('member.join-activity', compact('activity'));
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
        // dd( $request->input());
        $this->validate(
            $request,
            [
                'activity_id' => 'required|string',
                'state' => 'required|string',
            ]
        );
        $history = History::where('activity_id', '=', $request->get('activity_id'))
            ->where('user_id', '=', Auth::user()->user_id)
            ->first();

        if (!$history) {
            $dataActivity = array(
                'activity_id' => $request->get('activity_id'),
                'user_id' => Auth::user()->user_id,
                'state' => $request->get('state'),
            );
            History::create($dataActivity);
            if ($request->get('state') == "เข้าร่วม") {
                return redirect('/join_activity')->with('success', 'เข้าร่วมสำเร็จ');
            }
            if ($request->get('state') == "ไม่เข้าร่วม") {
                return redirect('/join_activity')->with('error', 'ไม่เข้าร่วม');
            }
        }
        return redirect('join_activity')->with('error', 'โหวตกิจกรรมนี้แล้ว');
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
        $history = History::where('activity_id', '=', $id)
            ->where('user_id', '=', Auth::user()->user_id)
            ->first();
        return view('member.satisfaction', compact('history'));
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
        // dd($request->input());
        $this->validate(
            $request,
            [
                'join' => 'required',
            ]
        );

        $history = Activity::where('activity_id', '=', $id)->first();
        $attr['assessment_status'] = $request->get('join');
        $history->update($attr);

        if ($request->get('join') == 1) {
            return redirect('history')->with('success', 'เปิดการประเมินสำเร็จ');
        } else {
            return redirect('history')->with('error', 'ปิดการประเมินสำเร็จ');
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
        //
    }
}

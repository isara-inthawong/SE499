<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Activity;
use Illuminate\Support\Facades\Auth;
use App\History;

class HistoryController extends Controller
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

        $history = History::where('user_id', '=', Auth::user()->user_id)->get();

        // dd($history);
        return view('member.history', compact('history'));
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
        return redirect('/join_activity')->with('error', 'ดำเนินการไม่สำเร็จ');
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
                'datetime_rate' => 'required|integer',
                'address_rate' => 'required|integer',
                'overview_rate' => 'required|integer',
            ]
        );

        $history = History::where('activity_id', '=', $id)
            ->where('user_id', '=', Auth::user()->user_id)
            ->first();

        $exits = Activity::where('activity_id', '=', $id)->first();
        if ($exits->assessment_status == 1) {
            if ($request->get('suggestion') == null) {
                $attr['date_time_rate'] = $request->get('datetime_rate');
                $attr['address_rate'] = $request->get('address_rate');
                $attr['overview_rate'] = $request->get('overview_rate');
                $history->update($attr);
                return redirect('my_history')->with('success', 'ประเมินสำเร็จ');
            } else {
                $attr['date_time_rate'] = $request->get('datetime_rate');
                $attr['address_rate'] = $request->get('address_rate');
                $attr['overview_rate'] = $request->get('overview_rate');
                $attr['suggestion'] = $request->get('suggestion');
                $history->update($attr);
                return redirect('my_history')->with('success', 'ประเมินสำเร็จ');
            }
        }
        return redirect('my_history')->with('error', 'ไม่สามารถประเมินกิจกรรมนี้ได้ หรือ การประเมินถูกปิด!');
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Activity;
use Illuminate\Support\Facades\Auth;
use App\History;
use Symfony\Component\Console\Input\Input;

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
        $count_join = History::where('state', '=', 'เข้าร่วม')
            ->get()
            ->groupBy('activity_id')
            ->map(function ($items) {
                return $items->count();
            });

        $sum_date = History::where('state', '=', 'เข้าร่วม')
            ->get()
            ->groupBy('activity_id')
            ->map(function ($items) {
                return $items->sum('date_time_rate');
            });

        $sum_address = History::where('state', '=', 'เข้าร่วม')
            ->get()
            ->groupBy('activity_id')
            ->map(function ($items) {
                return $items->sum('address_rate');
            });

        $sum_overview = History::where('state', '=', 'เข้าร่วม')
            ->get()
            ->groupBy('activity_id')
            ->map(function ($items) {
                return $items->sum('overview_rate');
            });

        // dd('date', $sum_date, 'address', $sum_address, 'over', $sum_overview);
        $collection = History::where('state', '=', 'เข้าร่วม')
            ->distinct('activity_id')
            ->get();

        $history = $collection->unique('activity_id');

        // dd($history);
        return view('admin.history', compact('history', 'count_join', 'sum_date', 'sum_address', 'sum_overview'));
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
            return redirect('admin/join_activity')->with('success', 'เข้าร่วมสำเร็จ');
        }
        return redirect('admin/join_activity')->with('success', 'เข้าร่วมไม่สำเร็จ');
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
        return view('admin.satisfaction', compact('history'));
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
                return redirect('admin/history')->with('success', 'ประเมินสำเร็จ');
            } else {
                $attr['date_time_rate'] = $request->get('datetime_rate');
                $attr['address_rate'] = $request->get('address_rate');
                $attr['overview_rate'] = $request->get('overview_rate');
                $attr['suggestion'] = $request->get('suggestion');
                $history->update($attr);
                return redirect('admin/history')->with('success', 'ประเมินสำเร็จ');
            }
        }
        return redirect('admin/history')->with('error', 'ไม่สามารถประเมินกิจกรรมนี้ได้ หรือ การประเมินถูกปิด!');
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

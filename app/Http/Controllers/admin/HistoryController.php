<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use App\Activity;
use Illuminate\Support\Facades\Auth;
use App\History;
use Barryvdh\DomPDF\Facade as PDF;

class HistoryController extends Controller
{


    public function downloadPDF($id)
    {
        $count_alljoin = History::where('activity_id', '=', $id)
            ->get()
            ->groupBy('activity_id')
            ->map(function ($items) {
                return $items->count();
            });
        $count_join = History::where('state', '=', 'เข้าร่วม')
            ->where('activity_id', '=', $id)
            ->get()
            ->groupBy('activity_id')
            ->map(function ($items) {
                return $items->count();
            });

        $count_unjoin = History::where('state', '=', 'ไม่เข้าร่วม')
            ->where('activity_id', '=', $id)
            ->get()
            ->groupBy('activity_id')
            ->map(function ($items) {
                return $items->count();
            });
        $count_cancle_join = History::where('state', '=', 'ยกเลิก')
            ->where('activity_id', '=', $id)
            ->where('activity_id', '=', $id)
            ->get()
            ->groupBy('activity_id')
            ->map(function ($items) {
                return $items->count();
            });

        $sum_date_rate = History::where('state', '=', 'เข้าร่วม')
            ->where('activity_id', '=', $id)
            ->get()
            ->groupBy('activity_id')
            ->map(function ($items) {
                return $items->sum('date_time_rate');
            });

        $sum_address_rate = History::where('state', '=', 'เข้าร่วม')
            ->where('activity_id', '=', $id)
            ->get()
            ->groupBy('activity_id')
            ->map(function ($items) {
                return $items->sum('address_rate');
            });

        $sum_overview_rate = History::where('state', '=', 'เข้าร่วม')
            ->where('activity_id', '=', $id)
            ->get()
            ->groupBy('activity_id')
            ->map(function ($items) {
                return $items->sum('overview_rate');
            });

        $history = History::where('state', '=', 'เข้าร่วม')
            ->where('activity_id', '=', $id)
            ->get();



        $show = History::where('activity_id', '=', $id)->first();

        $join_male_female = History::where('state', '=', 'เข้าร่วม')
            ->where('activity_id', '=', $id)
            ->get();
        $unjoin_male_female = History::where('state', '=', 'ไม่เข้าร่วม')
            ->where('activity_id', '=', $id)
            ->get();
        $cancle_join_male_female = History::where('state', '=', 'ยกเลิก')
            ->where('activity_id', '=', $id)
            ->get();

        $j_male = 0;
        $j_female = 0;
        $unj_male = 0;
        $unj_female = 0;
        $cancle_j_male = 0;
        $cancle_j_female = 0;
        $j_se = 0;
        $j_cs = 0;
        $j_fs = 0;
        $uj_se = 0;
        $uj_cs = 0;
        $uj_fs = 0;
        $cj_se = 0;
        $cj_cs = 0;
        $cj_fs = 0;
        foreach ($join_male_female as $key => $value) {
            if ($value->user->gender == "ชาย") {
                $j_male += 1;
            } else {
                $j_female += 1;
            }

            if ($value->user->major_id == 1) {
                $j_se += 1;
            } elseif ($value->user->major_id == 2) {
                $j_cs += 1;
            } else {
                $j_fs += 1;
            }
        }
        foreach ($unjoin_male_female as $key => $value) {
            if ($value->user->gender == "ชาย") {
                $unj_male += 1;
            } else {
                $unj_female += 1;
            }
            if ($value->user->major_id == 1) {
                $uj_se += 1;
            } elseif ($value->user->major_id == 2) {
                $uj_cs += 1;
            } else {
                $uj_fs += 1;
            }
        }
        foreach ($cancle_join_male_female as $key => $value) {
            if ($value->user->gender == "ชาย") {
                $cancle_j_male += 1;
            } else {
                $cancle_j_female += 1;
            }
            if ($value->user->major_id == 1) {
                $cj_se += 1;
            } elseif ($value->user->major_id == 2) {
                $cj_cs += 1;
            } else {
                $cj_fs += 1;
            }
        }

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

        // dd($unjoin_male_female['items']);
        // if ($unjoin_male_female->isEmpty()) {
        //     dd($unjoin_male_female);
        // }

        // dd(
        //     'show',
        //     $show,
        //     'j_se',
        //     $j_se,
        //     'j_cs',
        //     $j_cs,
        //     'j_fs',
        //     $j_fs,
        //     'uj_se',
        //     $uj_se,
        //     'uj_cs',
        //     $uj_cs,
        //     'uj_fs',
        //     $uj_fs,
        //     'cj_se',
        //     $cj_se,
        //     'cj_cs',
        //     $cj_cs,
        //     'cj_fs',
        //     $cj_fs,
        //     'join_male_female',
        //     $join_male_female,
        //     'unjoin_male_female',
        //     $unjoin_male_female,
        //     'cancle_join_male_female',
        //     $cancle_join_male_female,
        //     'j_male',
        //     $j_male,
        //     'j_female',
        //     $j_female,
        //     'unj_male',
        //     $unj_male,
        //     'unj_female',
        //     $unj_female,
        //     'cancle_j_male',
        //     $cancle_j_male,
        //     'cancle_j_female',
        //     $cancle_j_female,
        //     'count_alljoin',
        //     $count_alljoin,
        //     'count_join',
        //     $count_join,
        //     'count_unjoin',
        //     $count_unjoin,
        //     'count_cancle_join',
        //     $count_cancle_join,
        //     'sum_date_rate',
        //     $sum_date_rate,
        //     'sum_address_rate',
        //     $sum_address_rate,
        //     'sum_overview_rate',
        //     $sum_overview_rate,
        //     'history',
        //     $history,
        // );

        // $join_male = $join_male::where('state', '=', 'เข้าร่วม')
        //     ->where('gender', '=', 'ชาย')
        //     ->where('activity_id', '=', $id)
        //     ->get()
        //     ->groupBy('activity_id')
        //     ->map(function ($items) {
        //         return $items->count();
        //     });

        // $join_female = History::where('state', '=', 'เข้าร่วม')
        //     ->where('gender', '=', 'หญิง')
        //     ->where('activity_id', '=', $id)
        //     ->get()
        //     ->groupBy('activity_id')
        //     ->map(function ($items) {
        //         return $items->count();
        //     });

        return view(
            'admin.pdf',
            compact(
                'sum_date',
                'sum_address',
                'sum_overview',
                'show',
                'j_se',
                'j_cs',
                'j_fs',
                'uj_se',
                'uj_cs',
                'uj_fs',
                'cj_se',
                'cj_cs',
                'cj_fs',
                'join_male_female',
                'unjoin_male_female',
                'cancle_join_male_female',
                'j_male',
                'j_female',
                'unj_male',
                'unj_female',
                'cancle_j_male',
                'cancle_j_female',
                'count_alljoin',
                'count_join',
                'count_unjoin',
                'count_cancle_join',
                'sum_date_rate',
                'sum_address_rate',
                'sum_overview_rate',
                'history',
            )
        );

        // dd(
        //     'count_join',
        //     $count_join,
        //     'count_unjoin',
        //     $count_unjoin,
        //     'count_cancle_join',
        //     $count_cancle_join,
        //     'sum_date_rate',
        //     $sum_date_rate,
        //     'sum_address_rate',
        //     $sum_address_rate,
        //     'sum_overview_rate',
        //     $sum_overview_rate,
        //     'history',
        //     $history
        // );

        // $pdf = PDF::loadView(
        //     'admin.pdf',
        //     compact(
        //         'show',
        //         'count_join',
        //         'count_unjoin',
        //         'count_cancle_join',
        //         'sum_date_rate',
        //         'sum_address_rate',
        //         'sum_overview_rate',
        //         'history',
        //     )
        // );

        // return $pdf->stream('summary_' . $show->activity->activity_id . '.pdf');
    }

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

    public function index2()
    {
        if (session('success')) {
            Alert::success(session('success'));
        }
        if (session('error')) {
            Alert::error(session('error'));
        }
        // $count_join = History::where('state', '=', 'เข้าร่วม')
        //     ->get()
        //     ->groupBy('activity_id')
        //     ->map(function ($items) {
        //         return $items->count();
        //     });

        // $sum_date = History::where('state', '=', 'เข้าร่วม')
        //     ->get()
        //     ->groupBy('activity_id')
        //     ->map(function ($items) {
        //         return $items->sum('date_time_rate');
        //     });

        // $sum_address = History::where('state', '=', 'เข้าร่วม')
        //     ->get()
        //     ->groupBy('activity_id')
        //     ->map(function ($items) {
        //         return $items->sum('address_rate');
        //     });

        // $sum_overview = History::where('state', '=', 'เข้าร่วม')
        //     ->get()
        //     ->groupBy('activity_id')
        //     ->map(function ($items) {
        //         return $items->sum('overview_rate');
        //     });


        $history = History::all();


        // dd($history);
        // return view('admin.all-history', compact('history', 'count_join', 'sum_date', 'sum_address', 'sum_overview'));
        return view('admin.all-history', compact('history'));
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
                return redirect('admin/join_activity')->with('success', 'เข้าร่วมสำเร็จ');
            }
            if ($request->get('state') == "ไม่เข้าร่วม") {
                return redirect('admin/join_activity')->with('error', 'ไม่เข้าร่วม');
            }
        }
        return redirect('admin/join_activity')->with('error', 'โหวตกิจกรรมนี้แล้ว');

        // *************************
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
                return redirect('admin/join_activity')->with('success', 'เข้าร่วมสำเร็จ');
            }
            if ($request->get('state') == "ไม่เข้าร่วม") {
                return redirect('admin/join_activity')->with('error', 'ไม่เข้าร่วม');
            }
        }
        if ($request->get('state') == "ยกเลิก") {
            $history = History::where('activity_id', '=', $request->get('activity_id'))
                ->where('user_id', '=', Auth::user()->user_id)
                ->first();

            $attr['state'] = $request->get('state');
            $history->update($attr);
            return redirect('/my_history')->with('success', 'ยกเลิกสำเร็จ');
        }
        if ($history->state == "ยกเลิก") {
            $history = History::where('activity_id', '=', $request->get('activity_id'))
                ->where('user_id', '=', Auth::user()->user_id)
                ->first();

            $attr['state'] = $request->get('state');
            $history->update($attr);
            if ($request->get('state') == "เข้าร่วม") {
                return redirect('admin/join_activity')->with('success', 'เข้าร่วมสำเร็จ');
            }
            if ($request->get('state') == "ไม่เข้าร่วม") {
                return redirect('admin/join_activity')->with('error', 'ไม่เข้าร่วม');
            }
        }
        return redirect('admin/join_activity')->with('error', 'โหวตกิจกรรมนี้แล้ว');
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

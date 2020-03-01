<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\History;
use App\Activity;
use Alert;
use Illuminate\Support\Facades\Auth;

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
        $activity = Activity::orderBy('activity_id', 'desc')->paginate(10);
        return view('admin.join-activity', compact('activity'));
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
            // dd($dataActivity);
            History::create($dataActivity);

            // $data = new History(
            //     [
            //         'activity_id' => $request->get('activity_id'),
            //         'user_id' => Auth::user()->user_id,
            //         'state' => $request->get('state'),
            //     ]
            // );
            // dd($data);
            // $data->save();
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

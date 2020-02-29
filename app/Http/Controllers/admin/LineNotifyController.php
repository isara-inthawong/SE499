<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use KS\Line\LineNotify;
use App\MoonJamesModel;

class LineNotifyController extends Controller
{
    function index()
    {
        $collection = MoonJamesModel::all();
        return view('admin.line', compact('collection'));
    }
    function sent(Request $request)
    {
        /* line config */
        $token = '7J81Hhjpsw6YhWjJsxNMsZahzgqBexoFMoLoFg7XTvM';
        $ln = new LineNotify($token);

        $text = $request->get('text_message');
        $stkid = $request->get('stkid');

        // sticker
        $sticker = ['stickerPackageId' => '1', 'stickerId' => $stkid];

        $FileImage = $request->image;
        $imageName = null;

        if ($FileImage != null) {
            $imageName = time() . '.' . $FileImage->getClientOriginalExtension();
            $FileImage->move(public_path(''), $imageName);
        } elseif ($text != null && $stkid == null) {
            // send
            $ln->send($text);
            return back();
        } elseif ($stkid == null) {
            return back();
        } else {
            if ($text == null) {
                $text = 'Send Sticker';
            }
            // send
            $ln->send($text, null, $sticker);
            return back();
        }

        if ($text == null) {
            $text = '^ ^';
        }

        // image path
        $image_path = '' . $imageName; //Line notify allow only jpeg and png file

        // send
        $ln->send($text, $image_path, $sticker);

        \File::delete(public_path($image_path));

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\ModelCheckIn;
use Illuminate\Http\Request;

class CheckInController extends Controller
{
    public function __construct()
    {
    }

    public function addData(Request $request)
    {
        $data = new ModelCheckIn();
        $data->checkin_user_id = $request->input('checkin_user_id');
        $data->checkin_location_id = $request->input('checkin_user_id');
        $data->reason = $request->input('reason');
        $data->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Added',
        ], 201);
    }

    public function singleData($id)
    {
        $data = ModelCheckIn::where('checkin_user_id', $id)->get();

        if (count($data) > 0) {
            return response()->json([
                'success' => true,
                'message' => 'Data Found',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Not Found',
            ], 404);
        }
    }
}

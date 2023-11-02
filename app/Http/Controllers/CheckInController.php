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
        $this->validate($request, [
            'userId' => 'required|integer',
            'locationId' => 'required|integer',
            'reason' => 'required|string',
        ]);

        $data = new ModelCheckIn();
        $data->user_id = $request->input('userId');
        $data->location_id = $request->input('locationId');
        $data->reason = $request->input('reason');
        $data->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Added',
        ], 201);
    }

    public function singleData($id)
    {
        $data = ModelCheckIn::where('user_id', $id)->get();

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

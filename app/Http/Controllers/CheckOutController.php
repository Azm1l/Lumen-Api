<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelCheckOut;

class CheckOutController extends Controller
{

    public function __construct()
    {
    }

    public function singleData($id)
    {
        $data = ModelCheckOut::where('user_id', $id)->first();

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

    public function addData(Request $request)
    {
        $this->validate($request, [
            'userId' => 'required|integer',
            'locationId' => 'required|integer',
            'reason' => 'required|string',
        ]);

        $data = new ModelCheckOut();
        $data->user_id = $request->input('userId');
        $data->location_id = $request->input('locationId');
        $data->reason = $request->input('reason');
        $data->save();

        return response([
            'success' => true,
            'message' => 'Data Added',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\ModelMasterLocation;
use Illuminate\Http\Request;

class MasterLocationController extends Controller
{
    public function __construct()
    {
    }

    public function allData()
    {
        $data = ModelMasterLocation::all();
        return response([
            'success' => true,
            'data' => $data,
        ]);
    }

    public function singleData($id)
    {
        $data = ModelMasterLocation::where('location_id', $id)->get();

        if (count($data) > 0) {
            return response()->json([
                'success' => true,
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
        $data = new ModelMasterLocation();
        $data->location_name = $request->input('location_name');
        $data->location_address = $request->input('location_address');
        $data->location_latitude = $request->input('location_latitude');
        $data->location_longitude = $request->input('location_longitude');
        $data->location_description = $request->input('location_description');
        $data->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan',
        ], 200);
    }
}

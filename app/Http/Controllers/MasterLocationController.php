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
        $data = ModelMasterLocation::where('id', $id)->get();

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
        $this->validate($request, [
            'name' => 'required|string|min:3',
            'address' => 'required|string|min:3',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'required|integer',
        ]);

        $data = new ModelMasterLocation();
        $data->name = $request->input('name');
        $data->address = $request->input('address');
        $data->latitude = $request->input('latitude');
        $data->longitude = $request->input('longitude');
        $data->radius = $request->input('radius');
        $data->save();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan',
        ], 200);
    }
}

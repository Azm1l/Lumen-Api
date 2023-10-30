<?php

namespace App\Http\Controllers;

use App\ModelConsignee;
use Illuminate\Http\Request;

class ConsigneeController extends Controller
{
    public function __construct()
    {
    }

    public function addData(Request $request)
    {

        $data = new ModelConsignee();
        $data->consignee_id = $request->input('consignee_id');
        $data->consignee_name = $request->input('consignee_name');
        $data->address = $request->input('address');
        $data->zip_code = $request->input('zip_code');
        $data->city_code = $request->input('city_code');
        $data->phone = $request->input('phone');
        $data->fax_number = $request->input('fax_number');
        $data->email = $request->input('email');
        $data->description = $request->input('description');
        $data->update_by = $request->input('update_by');
        $data->save();
        return response('Berhasil Tambah Data');
    }

    public function allData()
    {
        $data = ModelConsignee::all();
        return response()->json($data);
    }

    public function singleData($id)
    {
        $data = ModelConsignee::where('consignee_id', $id)->get();

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

    public function putData(Request $request, $id)
    {
        $this->validate($request, [
            'consignee_name' => 'required|string|max:100|min:3',
        ]);
        $data = ModelConsignee::where('consignee_id', $id)->first();
        $data->consignee_name = $request->input('consignee_name');
        $data->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Updated',
        ], 200);
    }
}

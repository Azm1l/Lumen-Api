<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateBulkController extends Controller
{

    public function __construct()
    {
    }

    public function addData(Request $request)
    {

        try {

            $this->validate($request, [
                'econnote_form' => 'required|string|max:11|min:10',
                'econnote_to' => 'required|string|max:11|min:10',
                'status' => 'required|integer',
                'transaksi' => 'required|date',
                'remarks' => 'required|string|max:100|min:3',
                'status_by' => 'required|string|max:10|min:3',
            ]);

            $p_econnote_form = $request->input('econnote_form');
            $p_econnote_to = $request->input('econnote_to');
            $p_status = $request->input('status');
            $p_transaksi = $request->input('transaksi');
            $p_remarks = $request->input('remarks');
            $p_status_by = $request->input('status_by');

            $result = DB::select('call update_bulk_status(?,?,?,?,?,?)', array($p_econnote_form, $p_econnote_to, $p_status, $p_transaksi, $p_remarks, $p_status_by));
            return response()->json([
                'success' => true,
                'message' => 'Data Added',
            ], 201);
        } catch (\Throwable $th) {
            response()->json([
                'success' => false,
                'message' => 'Something Wrong',
            ], 201);
        }
    }
}

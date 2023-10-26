<?php

namespace App\Http\Controllers;

use App\ModelTrxDelivery;
use App\ModelTrxDeliveryDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function __construct()
    {
    }

    public function singleData($id)
    {
        $dataDetail = ModelTrxDeliveryDetail::where('econnote_number', $id)->get();
        $data = ModelTrxDelivery::where('econnote_number', $id)->get();
        return response()->json([
            'success' => 'true',
            'data' => $data,
            'dataDetail' => $dataDetail
        ]);
    }
}

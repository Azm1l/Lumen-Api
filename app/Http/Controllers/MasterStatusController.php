<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelMasterStatus;

class MasterStatusController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $data = ModelMasterStatus::all();
        return response([
            'success' => true,
            'data' => $data,
        ]);
    }
}

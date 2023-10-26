<?php

namespace App\Http\Controllers;

use App\ModelTodo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //

    public function index()
    {
        $data = ModelTodo::all();
        return response($data);
    }
    public function show($id)
    {
        $data = ModelTodo::where('id', $id)->get();
        return response($data);
    }
    public function store(Request $request)
    {
        $data = new ModelTodo();
        $data->activity = $request->input('activity');
        $data->description = $request->input('description');
        $data->save();

        return response('Berhasil Tambah Data');
    }
}

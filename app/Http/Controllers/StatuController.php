<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatuController extends Controller
{
    public function index()
    {
        $status = Status::all();
        return response()->json($status);
    }

    public function show($id)
    {
        $status = Status::find($id);
        if ($status) {
            return response()->json($status);
        }
        return response()->json(['message' => 'Status não encontrado'], 404);
    }
}

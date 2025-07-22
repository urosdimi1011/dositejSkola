<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function getAll(){
        $all = Position::all();

        return response()->json(['positions'=>$all]);
    }
}

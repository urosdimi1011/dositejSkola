<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticeRequest;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NoticeController extends Controller
{


    public function show($id)
    {
        $notice = Announcement::findOrFail($id);

        return Inertia::render('Notices/Show', [
            'notice' => $notice,
        ]);
    }
    public function getAll(){
        $all = Announcement::all();
        return response()->json(['obavestenja'=>$all]);
    }
    public function store(NoticeRequest $request){
        $data = $request->all();
        Announcement::create($data);

        return response()->json(['message'=>"Uspesno ste dodali obaveštenje!"], 201);

    }
}

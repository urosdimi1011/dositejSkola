<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublishedRequest;
use App\Http\Requests\ScheduleRequest;
use App\Http\Requests\ScheduleUpdateRequest;
use App\Http\Requests\StudyTypeRequest;
use App\Meta;
use App\Models\Announcement;
use App\Models\Schedule;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ScheduleController extends Controller
{
    public function store(ScheduleRequest $request){
        try{
            $data = $request->validated();
            $path = $request->file('file_path')->store('schedules', 'public');

            Schedule::create([
                'type'      => $data['type'],
                'title'     => $data['title'],
                'file_path'=> $path,
                'is_active' => $data['is_active'] ?? true,
                'study_program_id' => $data['study_program_id'] ?? null,
            ]);
            return response()->json(["message"=>"Uspesno ste dodali raspored"],201);

        }
        catch (\Exception $ex){
            return response()->json(['message'=>$ex->getMessage()],500);
        }
    }
    public function update(ScheduleUpdateRequest $request,$id){
        try{
            $data = $request->validated();
            $schedule = Schedule::findOrFail($id);

            if ($request->hasFile('file_path')) {
                Storage::disk('public')->delete($schedule->file_path); // Brišemo staru sliku

                $file     = $request->file('file_path');
                $filename = time() . '_' . $file->getClientOriginalName();

                $path = $file->storeAs('schedules', $filename, 'public');

                $data['file_path'] = $path;
            }
            $schedule->update($data);
            return response()->json(["message"=>"Uspesno ste izmenili raspored"],200);
        }
        catch (\Exception $ex){
            return response()->json(['message'=>$ex->getMessage()],500);
        }
    }
    public function getAllInAdmin(){
        $classes = Schedule::all();
        return response()->json(['rasporedi'=>$classes]);
    }

    public function get(StudyTypeRequest $request,$type = null){
//        dd("SUli");

        $bool = $request->has('allData') ? filter_var($request->input('allData'), FILTER_VALIDATE_BOOLEAN) : null;

        if($type != null && !$request->has('study_program_id') && !$bool){
            $classes = Schedule::where('type',$type)->where('is_active', true);
            $classes = $classes->get();
            $title = "Visoka škola akademskih studija Dositej - Rasporedi $type";
            Meta::setTitle($title);
            return Inertia::render('user/Schedule',['rasporedi'=>$classes,'type'=>$type]);
        }
        else{
            $classes =  Schedule::where('is_active', true);

            if($study = $request->input('study_program_id')){
                $classes = $classes->where('study_program_id',$study);
            }
            if($typeForParams = $request->input('type')){
                $classes = $classes->where('type',$typeForParams);
            }
        }
        $classes = $classes->get();
        return response()->json(['raspored'=>$classes]);
    }
    public function updatePublished(PublishedRequest $request,string $id){
        try{
            $bool = filter_var($request->input('is_published'), FILTER_VALIDATE_BOOLEAN);

            $schedule = Schedule::findOrFail($id);
            $schedule->is_active = $bool;
            $schedule->save();
            return response()->json(['message'=>"Uspesno ste izmenili raspored!"], 201);

        }
        catch (\Exception $ex){
            return response()->json(['message'=>$ex->getMessage()],500);
        }
    }
    public function getOne($id){

        $schedule = Schedule::where('is_active',true)->findOrFail($id);
        return response()->json(['raspored'=>$schedule]);
    }
}

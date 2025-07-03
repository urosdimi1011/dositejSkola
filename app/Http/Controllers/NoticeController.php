<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilterNoticeRequest;
use App\Http\Requests\NoticeRequest;
use App\Http\Requests\PublishedRequest;
use App\Models\Announcement;
use Inertia\Inertia;
use Mockery\Exception;

class NoticeController extends Controller
{


    public function show(string $notice)
    {
        $notice = Announcement::with('author')
            ->where('slug', $notice)
            ->where('is_published', 1)
            ->firstOrFail();
//        $notice = $notice->with(['author'])->where('is_published','=',1);
//        dd($notice);
//        dd($notice->get());
        return Inertia::render('user/OneNotice', [
            'notice' => $notice,
        ]);
    }
    public function showInAdminPanel($id)
    {
        $notice = Announcement::with(['author'])->findOrFail($id);
        return response()->json(['notice'=>$notice]);
    }
    public function getAll(){
        $all = Announcement::with("author")->get();
        return response()->json(['obavestenja'=>$all]);
    }
    public function getAllInApp(FilterNoticeRequest $request){
        $all = Announcement::with('author')->where('is_published', 1);
        $limit = 10;

        if($search = $request->input('search')){
            $all= $all->where(function($q) use ($search) {
                $q->whereLike('title', "%$search%")
                    ->orWhereLike('content', "%$search%");
            });
        }

        if($category = $request->input('category')){
            $all = $all->orderByRaw("category IN ('{$category}') DESC");
        }



        if($search || $allData = $request->input('all')){
            $all = $all->orderBy('created_at','desc')->get();
            return Inertia::render('user/AllNotice',['notices'=>$all,'search'=>$search]);
        }
        else{
            $all = $all->orderBy('created_at','desc')->limit($limit)->get();
            return response()->json(['obavestenja'=>$all]);
        }
    }

//    public function getAllNotices(Request $request){
//
//        $all = Announcement::with('author')->where('is_published', 1);
//        $dataForSend = ['notices'=>$all];
//        if($search = $request->input('search')){
//            $dataForSend+=['search'=>$search];
//        }
//        return Inertia::render('user/AllNotice',$dataForSend);
//    }

    public function store(NoticeRequest $request){
        //Ovo ovde je kreiranje notice
        try{
            $data = $request->validated();
            $data['created_by'] = auth()->id();
            $data['is_published'] = true;
            Announcement::create($data);
            return response()->json(['message'=>"Uspesno ste dodali obaveštenje!"], 201);
        }
        catch (Exception $ex){
            return response()->json(['message'=>$ex->getMessage()],500);
        }
    }
    public function updatePublished(PublishedRequest $request,string $id){
        try{
//            $is_published = (int)$request->boolean("is_published");
            $bool = filter_var($request->input('is_published'), FILTER_VALIDATE_BOOLEAN);

            $notice = Announcement::findOrFail($id);
            $notice->is_published = $bool;
            $notice->save();
            return response()->json(['message'=>"Uspesno ste izmenili obavestenje!"], 201);

        }
        catch (\Exception $ex){
            return response()->json(['message'=>$ex->getMessage()],500);
        }
    }

    public function update(NoticeRequest $request,$id){
        try{
            $allData = $request->all();
            $notice = Announcement::findOrFail($id);
            $notice->update($allData);

            $notice->save();
            return response()->json(['message'=>"Uspesno ste izmenili obavestenje!"], 200);
        }
        catch (\Exception $ex){
            return response()->json(['message'=>$ex->getMessage()],500);
        }
    }

}

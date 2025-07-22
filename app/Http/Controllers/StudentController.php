<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentApplicationRequest;
use App\Mail\StudentApplicationNotification;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function sendMail(StudentApplicationRequest $request){
        try{
            $data = $request->all();
            $skolskiEmail = 'office@vsdositej.edu.rs';

            Mail::to($skolskiEmail)
            ->send(new StudentApplicationNotification($data));

            return response()->json([
                'message' => 'Student uspešno kreiran i mejl poslat.'
            ]);
        }
        catch(\Exception $ex){
            return response()->json(['message'=>$ex->getMessage()],500);
        }
    }
    public function sendContantactMail(StudentApplicationRequest $request){
        try{
            $data = $request->validated();

            $skolskiEmail = 'dimitrijevicuros1011@gmail.com';

            Mail::to($skolskiEmail)
                ->send(new StudentApplicationNotification($data));
            return response()->json([
                'message' => 'Student uspešno kreiran i mejl poslat.'
            ]);
        }
        catch(\Exception $ex){
            return response()->json(['message'=>$ex->getMessage()],500);
        }
    }
}

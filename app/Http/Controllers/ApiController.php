<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function listMessage(Request $request) {
        
        $id = $request->input('id') ;
        if($id){
            if($id > 1 ){
                return response()->json(Message::with('user')->where('id', '>', $id)->get());
            }
            else{
                return response()->json(Message::with('user')->latest()->take(10)->get());
            }
        }
        else{
            return response()->json(["status" => "error"]);
        }
    }

    public function sendMessage(Request $request) {
        $contenu = $request->input('message') ;
        if($contenu){
            $message = new Message() ;
            $message->contenu = $contenu ;
            $message->user_id = Auth::id() ;
            $message->save() ;
            return response()->json(["status" => "success"]);
        }
        else{
            return response()->json(["status" => "error"]);
        }
        
    }
}

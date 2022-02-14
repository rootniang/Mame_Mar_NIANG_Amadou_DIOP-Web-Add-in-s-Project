<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function listMessage(Request $request) {
        
        $id = (int)strip_tags($request->query('id')) ;
        if($id){
            if($id > 1 ){
                return response()->json(Message::with('user')->where('id', '>', $id)->orderBy('id', 'asc')->get());
            }
            else{
                return response()->json(Message::with('user')->orderBy('id', 'asc')->get());
            }
        }
        else{
            return response()->json(["status" => "error"]);
        }
    }

    public function sendMessage(Request $request) {
        $contenuJSON = $request->getContent() ;
        $contenu = json_decode($contenuJSON) ;
        if($contenu->message && !empty($contenu->message)){
            $message = new Message() ;
            $message->contenu = $contenu->message ;
            $message->user_id = Auth::id() ;
            $message->save() ;
            return response('Success', 201) ;
        }
        else{
            return response()->json(["status" => "error"]);
        }
        
    }

    public function UtilisateurEnLigne(Request $request) {
        
        return response()->json(Session::with('user')->where('user_id', '!=', NULL)->get());
    }
}

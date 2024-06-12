<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class Chat_data extends Controller
{
    public function Fetch_friend($id){
        $result = User::where('Email', $id)->update(array('Status' => 'Active'));
        return view('chat',compact('result'));        
    }
}

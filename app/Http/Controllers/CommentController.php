<?php

namespace App\Http\Controllers;

use App\Events\chat;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\RoomRequest;
use App\Models\Comment;
use App\Models\Room;

class CommentController extends Controller
{

    public function pusher(Room $room){
        return view('rooms/play')->with(['room'=>$room]);
    }
    public function fetchMessages()
    {
        return Comment::where('room_id',$room->id)->get();
    }


    // メッセージ送信
    public function sendMessage(Request $request, Room $room)
    {
        //$user = Auth::user();

        // DBにメッセージを保存
        $comment = Comment::create([
            'room_id' => $room->id,
            'user_name' => "test",
            'body' => $request["message"]
        ]);
        broadcast(new chat($comment))->toOthers();
        return Comment::where('room_id',$room->id)->get();
    }
}

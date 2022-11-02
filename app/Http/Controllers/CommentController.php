<?php

namespace App\Http\Controllers;

use App\Events\chat;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
//use App\Http\Requests\RoomRequest;
use App\Models\Comment;
use App\Models\Room;
use App\Models\Character;
use App\Models\Status;

class CommentController extends Controller
{

    public function pusher(Room $room, Character $character, Status $status){
        return view('rooms/play')->with(['room'=>$room,'characters'=>$character,'statuses'=>$status]);
    }
    public function fetchMessages(Room $room)
    {
        return Comment::where('room_id',$room->id)->get();
    }


    // メッセージ送信
    public function sendMessage(CommentRequest $request, Room $room)
    {
        //$user = Auth::user();

        // DBにメッセージを保存
        $comment = Comment::create([
            'room_id' => $room->id,
            'user_name' => $request["name"],
            'body' => $request["message"]
        ]);
        broadcast(new chat($comment))->toOthers();
        return Comment::where('room_id',$room->id)->get();
    }
}

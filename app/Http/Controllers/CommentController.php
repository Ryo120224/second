<?php

namespace App\Http\Controllers;

use App\Events\chat;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
        public function pusher(){
        return view('pusher');
    }
        public function fetchMessages()
    {
        return Comment::where('room_id',1)->get();
    }

    // メッセージ送信
    public function sendMessage(Request $request)
    {
        //$user = Auth::user();

        // DBにメッセージを保存
        $comment = Comment::create([
            'room_id' => 1,
            'user_name' => $request["user_name"],
            'body' => $request["body"]
        ]);
        broadcast(new chat($comment))->toOthers();
        return Comment::where('room_id',1)->get();
    }
}

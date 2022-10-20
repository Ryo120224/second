<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Room;

class RoomController extends Controller
{
    public function index(Room $room)
    {
        return view('rooms/index')->with(['rooms' => $room->getPaginateByLimit()]);  
    }

    public function show(Room $room)
    {
        return view('rooms/show')->with(['room' => $room]);
    }
        public function create()
    {
        return view('rooms/create');
    }
    
    public function store(RoomRequest $request, Room $room)
    {
        $input = $request['room'];
        $room->fill($input)->save();
        return redirect('/rooms/' . $room->id);
    }
    public function pusher(){
        return 'chat';
    }

}

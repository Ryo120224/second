<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Http\Requests\PassRequest;
use App\Models\Room;

class RoomController extends Controller
{
    public function index(Room $room)
    {
        return view('rooms/index')->with(['rooms' => $room->getPaginateByLimit()]);  
    }

    public function entrance(Room $room)
    {
        
        return view('rooms/entrance')->with(['room' => $room]);
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
        //return redirect('/rooms');
    }

    public function enter(PassRequest $request, Room $room)
    {
        $words=$request['wpass'];
        $pass=$room->password;
        if($words==$pass){
            return redirect('/play/'. $room->id);
        }else{
            return redirect('/rooms/'.$room->id);
        }
    }
}

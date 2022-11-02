<?php

namespace App\Http\Controllers;

use App\Http\Requests\CharacterRequest;
use App\Models\Room;
use App\Models\Character;

class CharacterController extends Controller
{
    public function characreate(Room $room)
    {
        return view('/rooms/characreate')->with(['room' => $room]);
    }
    public function cstore(CharacterRequest $request, Room $room, Character $character)
    {
        $input = $request['character'];
        $input['room_id']=$room->id;
        $character->fill($input)->save();
        return redirect('/play/' . $room->id);
    }

}

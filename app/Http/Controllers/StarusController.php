<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StatusRequest;
use App\Http\Requests\CharacterRequest;
use App\Models\Status;
use App\Models\Character;

class StarusController extends Controller
{
    public function statuscreate(Character $character)
    {
        return view('rooms/statuscreate')->with(['room'=>$room, 'character'=>$character]);
    }
    public function sstore(StatusRequest $request,Status $status,Character $character,Room $room)
    {
        $input = $request['status'];
        $input['character_id']=$character->id;
        $status->fill($input)->save();
        return redirect('/play/' . $room->id);
    }
}

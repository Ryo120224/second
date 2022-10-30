<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'room.title' => 'required|string|max:100',
            'room.password' => 'required|string|max:100',
            //'wroten.password' => 'required|string|max100',
        ];
    }
}

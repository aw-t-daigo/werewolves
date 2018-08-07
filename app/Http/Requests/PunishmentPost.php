<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PunishmentPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $roomId = $this->session()->get('roomId');
        if (empty($roomId)) {
            return false;
        }
        return Room::find($roomId)->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'playerId' => 'required|integer'
        ];
    }
}

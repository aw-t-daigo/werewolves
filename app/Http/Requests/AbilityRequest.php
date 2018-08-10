<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbilityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * roomId, playerId, roleIdをセッションとクッキーで比較
     * @return bool
     */
    public function authorize()
    {
        if ($this->session()->get('roomId') != $this->cookie('roomId')) {
            return false;
        }
        if ($this->session()->get('playerId') != $this->cookie('playerId')) {
            return false;
        }
        if ($this->session()->get('roleId') != $this->cookie('roleId')) {
            return false;
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'player_id' => 'required|exists:player',
        ];
    }
}

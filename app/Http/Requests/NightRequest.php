<?php

namespace App\Http\Requests;

use App\Models\Room;
use Illuminate\Foundation\Http\FormRequest;

class NightRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * セッションに正しいroomIdを持つかチェック
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
     * バリデーションなし
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}

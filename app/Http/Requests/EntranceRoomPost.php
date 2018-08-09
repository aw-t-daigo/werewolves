<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntranceRoomPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 何もしないのでスルー
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * 入室画面のバリデーション
     * @return array
     */
    public function rules()
    {
        return [
            'room_id' => 'required|integer|exists:room',
            'player_name' => 'required|max: 10',
            'role' => 'not_in: 0',
        ];
    }

    /**
     * 役職バリデーションのカスタムメッセージ
     * @return array
     */
    public function messages()
    {
        return [
            'room_id.exists' => '存在しない部屋IDです',
            'role.not_in' => '役職が選択されていません'
        ];
    }
}

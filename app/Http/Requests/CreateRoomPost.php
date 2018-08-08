<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoomPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 特に確認すべき権限はないのでスルー
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * player_numが選ばれているかのバリエーション
     * @return array
     */
    public function rules()
    {
        return [
            'player_num' => 'not_in: 0'
        ];
    }

    public function messages()
    {
        return [
            'player_num.not_in' => 'プレイヤー数を選択してください'
        ];
    }
}
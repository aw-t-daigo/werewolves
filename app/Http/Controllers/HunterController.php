<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbilityRequest;
use App\Services\GuardService;

class HunterController extends Controller
{
    public function show()
    {
        return view('night.hunter');
    }

    public function guard(AbilityRequest $request, GuardService $service)
    {
        $roomId = $request->session()->get('roomId');
        $targetPlayer = $request->player_id;

        $message = $service->guard($roomId, $targetPlayer);

        return response()->json($message);
    }
}

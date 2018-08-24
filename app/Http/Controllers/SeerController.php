<?php

namespace App\Http\Controllers;

use App\Events\SeerReceived;
use App\Http\Requests\AbilityRequest;
use App\Services\SeerService;

class SeerController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('night.seer');
    }

    /**
     * @param AbilityRequest $request
     * @param SeerService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function seer(AbilityRequest $request, SeerService $service)
    {
        $roomId = $request->session()->get('roomId');
        $targetPlayer = $request->player_id;

        $message = $service->seer($roomId, $targetPlayer);

        event(new SeerReceived($message, $roomId));

        return response()->json($message);
    }
}

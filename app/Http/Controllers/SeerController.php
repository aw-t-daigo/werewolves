<?php

namespace App\Http\Controllers;

use App\Events\SeerReceived;
use App\Http\Requests\AbilityRequest;
use App\Services\SeerService;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

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

        try {
            $service->seer($roomId, $targetPlayer);
        } catch (BadRequestHttpException $e) {
            throw $e;
        }

        $message = $service->createMessage();

        event(new SeerReceived($message, $roomId));

        return response()->json($message);
    }
}

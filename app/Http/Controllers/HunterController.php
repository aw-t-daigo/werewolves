<?php

namespace App\Http\Controllers;

use App\Http\Requests\AbilityRequest;
use App\Services\GuardService;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class HunterController extends Controller
{
    public function show()
    {
        return view('night.hunter');
    }

    /**
     * @param AbilityRequest $request
     * @param GuardService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function guard(AbilityRequest $request, GuardService $service)
    {
        $roomId = $request->session()->get('roomId');
        $targetPlayer = $request->player_id;

        try {
            $service->guard($roomId, $targetPlayer);
        } catch (BadRequestHttpException $e) {
            throw $e;
        }

        $message = $service->createMessage();

        return response()->json($message);
    }
}

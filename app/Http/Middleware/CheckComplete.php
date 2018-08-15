<?php

namespace App\Http\Middleware;

use App\Models\RoleStatus;
use Closure;

class CheckComplete
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param RoleStatus $roleStatus
     * @return mixed
     */
    public function handle($request, Closure $next, RoleStatus $roleStatus)
    {
        $resp = $next($request);

        $isCompleted = $roleStatus->where('room_id', $request->session()->get('roomId'))
            ->where('is_completed', '=', false);
        if ($isCompleted) {
            // TODO: 操作終了時の処理
        }

        return $resp;
    }
}

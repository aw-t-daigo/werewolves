<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoomId
{
    /**
     * セッションにroomIdを持つかチェック
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('roomId')) {
            return abort(404);
        }
        return $next($request);
    }
}

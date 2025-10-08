<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // セッション is_admin が true でなければ管理画面へ行けない
        if (! $request->session()->get('is_admin', false)) {
            // ログイン画面へリダイレクト（メッセージ付ける）
            return redirect('/admin/login')->withErrors(['msg' => '管理者としてログインしてください。']);
            // もしくは abort(403) にするなら下記を使う：
            // abort(403, 'アクセス権がありません。');
        }

        return $next($request);
    }
}

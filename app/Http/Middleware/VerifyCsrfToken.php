<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Config;
use Log;

class VerifyCsrfToken extends BaseVerifier {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        Log::debug('TaskIT', ['Path' => $request->path(), 'Requester' => $request->getUser()]);
        if($request->method() == "POST")
        {
            return parent::addCookieToResponse($request, $next($request));
        }
        /*
        if(in_array($request->path(), Config::get('auth.no_csrf')))
        {

            return parent::addCookieToResponse($request, $next($request));
        }
        */
		return parent::handle($request, $next);
	}

}

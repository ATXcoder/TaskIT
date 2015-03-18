<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Log;
use Response;
class ContextRequest extends Request
{
    public function rules()
    {
    	Log::info('Checking rules...');
        return [
            'name' => 'required',
        ];
    }

    public function authorize()
    {
        // Only allow logged in users
        // return \Auth::check();
        // Allows all users in
        Log::info('User Authorized...');
        return \Auth::check();
    }

    // OPTIONAL OVERRIDE
    public function forbiddenResponse()
    {
        // Optionally, send a custom response on authorize failure 
        // (default is to just redirect to initial page with errors)
        // 
        // Can return a response, a view, a redirect, or whatever else
        return Response::make('Permission denied', 403);
    }

    
}
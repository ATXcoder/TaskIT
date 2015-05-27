<?php namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Context;
use Response;
use View;
use Log;
use Request;
use Auth;
use Redirect;

class ContextController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index ()
	{
		$userID = Auth::user()->id;
	}
	

	/*
	 * Show tasks by context
	 */
	public function filter($filter)
	{
		// Get userID	
		$userID = Auth::user()->id;
		
		// Get the context ID
		$contextID = Context::getContextID($userID, $filter);
		
		/// Get all tasks for a context
		$task = Task::getContextTasks($userID, $contextID);		
		
		// Get contexts, projects, etc for sidebar
		$sb = new \App\Repositories\SideBarData();
		$data = $sb::getAll();
		
		$info = [
		'tasks' => $task,
		'contexts'=>$data['contexts'],
		'projects'=>$data['projects'],
		'tags'=>$data['tags']];
		
		return view('context/tasks',$info);
	}
	
	public function add()
	{
		
		// Get userID	
		$userID = Auth::user()->id;

        // Get contexts, projects, etc for sidebar
        $sb = new \App\Repositories\SideBarData();
        $data = $sb::getAll();

        $info = [
            'contexts'=>$data['contexts'],
            'projects'=>$data['projects'],
            'tags'=>$data['tags']];

       return view('context/add',$info);
	}
	
	public function store()	
	{
		Log::info('PostAdd');
		$request = Request::get('title');
		
		$context = new Context;
		$context->title = $request;
		$context->user_id = Auth::user()->id;
		$context->save();
		
		return Redirect::action('ContextController@add')->with('messages', 'Context Added');
	}
	
}
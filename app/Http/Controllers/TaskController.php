<?php namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Context;
use App\Project;
use App\Tag;
use Auth; //Needed for access to Authenticated user info
use Input;
use Request;
use Moment;
use Illuminate\Contracts\Auth\Authenticatable;

class TaskController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Task Controller
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


	/**
	 * Show user TASKS view.
	 *
	 * @return Response
	 */
	public function index()
	{		
		// Get userID	
		$userID = Auth::user()->id;
		// Get user Tasks - defaults to inbox
		$task = Task::getUserTasks($userID, 'Inbox');
		
		// Get contexts, projects, etc
		$sb = new \App\Repositories\SideBarData();
		$data = $sb::getAll();
		
		// Return view
		return view('tasks\list',['tasks' => $task, 'contexts'=>$data['contexts'],'projects'=>$data['projects'],'tags'=>$data['tags']]);
	}
	
	/**
	 * Show user INBOX view
	 */
	public function location($location)
	{
		$userID = Auth::user()->id;
		
		// Get Inbox tasks
		$task = Task::getUserTasks($userID, $location);
		
		// Get contexts, projects, etc
		$sb = new \App\Repositories\SideBarData();
		$data = $sb::getAll();
		
		$info = [
		'tasks' => $task,
		'contexts'=>$data['contexts'],
		'projects'=>$data['projects'],
		'tags'=>$data['tags']];
		
		return view('tasks\list',$info);
	}
	
	public function create()
	{
		
		// Get contexts, projects, etc for sidebar
		$sb = new \App\Repositories\SideBarData();
		$data = $sb::getAll();
		
		// Get Project List for drop-down
		$project_list = Project::getProjectList(Auth::user()->id);
		
		
		$info = [
		'contexts'=>$data['contexts'],
		'projects'=>$data['projects'],
		'tags'=>$data['tags'],
		'project_list'=>$project_list,
		'info'=>null];
		
		return view('tasks\create', $info);
	}
	
	public function store()
	{
		$input = Request::all();
				
		$due = $input['due_date'];
		
		$m = new \Moment\Moment($due, 'CST');
	    $m->setTimezone('UTC')->format('Y-m-d');

		$task = new Task();
		$task->title = $input['title'];
		$task->description = $input['description'];
		$task->project_id = $input['project_id'];
		$task->task_location = 'Inbox';
		$task->assignee_id = Auth::user()->id;
		$task->created_by = Auth::user()->id;
		$task->due_date = $m->format('Y-m-d');
		$task->save();
		
		// Refresh view
		// Get contexts, projects, etc
		$sb = new \App\Repositories\SideBarData();
		$data = $sb::getAll();
		
		// Get Project List, Context List, etc
		$project_list = Project::getProjectList(Auth::user()->id);
		
		$info = [
		'contexts'=>$data['contexts'],
		'projects'=>$data['projects'],
		'tags'=>$data['tags'],
		'project_list'=>$project_list,
		'info'=>"Task '".$task->title."' has been added"];
		
		return view ('tasks\create', $info);
	}

	public function filter($filter)
	{
		$userID = Auth::user()->id;

        switch($filter)
        {
            case 'today':
                $task = Task::getTodaysTasks($userID);
                break;
            case 'tomorrow':
                $task = Task::getTomorrowsTasks($userID);
                break;
            case 'scheduled':
                $task = Task::getScheduledTasks($userID);
                break;
            // By default we just grab tasks due today
            default:
                $task = Task::getTodaysTasks($userID);
                break;
        }

		
		$sb = new \App\Repositories\SideBarData();
		$data = $sb::getAll();
		
		$info = [
		'tasks' => $task,
		'contexts'=>$data['contexts'],
		'projects'=>$data['projects'],
		'tags'=>$data['tags']];
		
		return view('tasks\list',$info);
	}

    public function getTask($taskID)
    {
        $userID = Auth::user()->id;
        $task = Task::getTask($taskID,$userID);

        $sb = new \App\Repositories\SideBarData();
        $data = $sb::getAll();

        $info = [
            'tasks' => $task,
            'contexts'=>$data['contexts'],
            'projects'=>$data['projects'],
            'tags'=>$data['tags']];

        return view('tasks\details',$info);

    }

}

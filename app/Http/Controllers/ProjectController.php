<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Auth;
use App\Task;
use App\Context;
use App\Project;

class ProjectController extends Controller {
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function project($project)
	{
		dd($project);
	}
	

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sb = new \App\Repositories\SideBarData();
		$data = $sb::getAll();
		return view('projects\list',['contexts'=>$data['contexts'],'projects'=>$data['projects'], 'tags'=>$data['tags']]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($location)
	{
		//Show a specific project
		
		// Get userID	
		$userID = Auth::user()->id;

		// Get contexts, projects, etc
		$sb = new \App\Repositories\SideBarData();
		$data = $sb::getAll();
		
		// Get project id
		$projectID = Project::getProjectID($userID,$location);
		
		// Get tasks that belong to project
		$task = Task::getProjectTasks($userID, $projectID);
		
		
		$info = [
		'tasks' => $task,
		'contexts'=>$data['contexts'],
		'projects'=>$data['projects'],
		'tags'=>$data['tags']];
		
		return view('projects\tasks',$info);
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}

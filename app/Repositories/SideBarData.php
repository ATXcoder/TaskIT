<?php namespace App\Repositories;

use Auth;
use App\Context;
use App\Project;
use App\Tag;

class SideBarData {
	
	public function getContexts()
	{
		$userID = Auth::User()->id;
		$contexts = Context::where('user_id','=',$userID)->get();
		return $contexts;
	}
	
	public function getProjects()
	{
		$userID = Auth::User()->id;
		$projects = Project::where('user_id','=',$userID)->get();
		return $projects;
	}
	
	public function getTags()
	{
		$userID = Auth::User()->id;
		$tags = Tag::where('user_id','=',$userID)->get();
		return $tags;
	}
	
	public static function getAll()
	{
		$sb = new SideBarData();
		$contexts = $sb->getContexts();
		$projects = $sb->getProjects();
		$tags = $sb->getTags();
		$info = ['contexts'=>$contexts,'projects'=>$projects,'tags'=>$tags];
		return $info;
	} 
}

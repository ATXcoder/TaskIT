<?php namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Project extends Model 
{
	protected $table = 'project';
	
	protected $fillable = ['title', 'group','user_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['id'];
	
	protected $primaryKey = 'id';
	
	public static function getUserProjects($userID)
	{
		$project = Project::whereRaw('user_id = ?',[$userID])->get();
		return $project;
	}
	
	
	public static function getProjectList($userID)
	{
		$project_list = DB::table('project')->where('user_id',$userID)->lists('title','id');
		return $project_list;
	}
	
	public static function getProjectID($userID, $title)
	{
		$projID = Project::whereRaw('user_id = ? and title = ?',[$userID, $title])->pluck('id');
		return $projID;
	}
}

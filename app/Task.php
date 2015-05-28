<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


use Moment;

class Task extends Model {

	protected $table = 'task';
	
	//protected $fillable = ['name'];
	 protected $guarded = array('id');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['id'];
	
	protected $primaryKey = 'id';

	
	public static function taskCount($userID)
	{
		// Get count of all user tasks
		$task = Task::where('assignee_id', '=', $userID)->count();
		return $task;
	}

    /**
     * Get overdue tasks for the user
     * @param $userID
     * @return mixed
     */
    public static function getOverDueTasks($userID){
        // Today
        $yesterday = new \Moment\Moment('yesterday', 'CST');
        $yesterday->setTimezone('UTC')->format('Y-m-d');

        $task = Task::whereRaw('assignee_id = ? and due_date <= ? and complete = 0',[$userID, $yesterday->format('Y-m-d')])->count();
        return $task;
    }

    public static function getTask($id, $userID)
    {
        $query = "SELECT task.id, task.title, task.due_date, task.description, task.task_location, context.title as 'context', project.title AS 'project'".
            " FROM task".
            " LEFT JOIN context ON task.context_id = context.id".
            " LEFT JOIN project ON task.project_id = project.id".
            " WHERE assignee_id = $userID and task.id = $id";

        $task = DB::select($query);
        //$task = Task::whereraw('assignee_id = ? and id = ?',[$userID, $id])->get();
        return $task;
    }

	public static function getTodaysTasks($userID)
	{
		$today = new \Moment\Moment('today', 'CST');
	    $today->setTimezone('UTC')->format('Y-m-d');

		$task = Task::whereRaw('assignee_id = ? and due_date = ?',[$userID, $today->format('Y-m-d')])->get();
		return $task;
	}
	
	public static function getTomorrowsTasks($userID)
	{
		$today = new \Moment\Moment('tomorrow', 'CST');
	    $today->setTimezone('UTC')->format('Y-m-d');

		$task = Task::whereRaw('assignee_id = ? and due_date = ?',[$userID, $today->format('Y-m-d')])->get();
		return $task;
	}

    public  static function getAllUserTasks($userID)
    {

    }
	
	public static function getUserTasks($userID, $location)
	{
		$task = Task::whereRaw('assignee_id = ? and task_location = ?',[$userID, $location])->get();
		return $task;
	}
	
	public static function getInboxTasks($userID)
	{
		$task = Task::whereRaw('assignee_id = ? and task_location = ?',[$userID, 'Inbox'])->get();
		return $task;
	}
	
	public static function getProjectTasks($userID, $location)
	{
		$task = Task::whereRaw('assignee_id = ? and project_id = ?',[$userID, $location])->get();
		return $task;
	}
	
	public static function getContextTasks($userID, $context)
	{
		$task = Task::whereRaw('assignee_id = ? and context_id = ?',[$userID, $context])->get();
		return $task;
	}

    public static function getScheduledTasks($userID)
    {
        $today = new \Moment\Moment('yesterday', 'CST');
        $today->setTimezone('UTC')->format('Y-m-d');

        //Show me all tasks that have not been completed and have a scheduled due date
        $task = Task::whereRaw('assignee_id = ? and complete = 0 and due_date IS NOT NULL',[$userID])->get();
        return $task;
    }

}

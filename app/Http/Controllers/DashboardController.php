<?php namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Context;

use Illuminate\Contracts\Auth\Authenticatable;

class DashboardController extends Controller
{

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


    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function dashboard(Authenticatable $user)
    {
        //$user = User::where('email', '=', $user->email)->firstOrFail();

        $userID = $user->id;

        // Get count of all user tasks
        $tasks = Task::taskCount($userID);

        // Get count of all overdue user tasks
        $lateTasks = Task::getOverDueTasks($userID);

        // Get contexts, projects, etc
        $sb = new \App\Repositories\SideBarData();
        $data = $sb::getAll();

        $info = ['totalTask' => $tasks,
            'lateTasks' => $lateTasks,
            'contexts' => $data['contexts'],
            'projects' => $data['projects'],
            'tags' => $data['tags']];

        // Return view
        return view('dashboard', $info);

    }


}

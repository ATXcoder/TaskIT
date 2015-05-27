<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/taskit/dashboard">TaskIt</a>
	</div>
	<!-- /.navbar-header -->

	<ul class="nav navbar-top-links navbar-right">
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i> </a>
			<ul class="dropdown-menu dropdown-messages"></ul>
			<!-- /.dropdown-messages -->
		</li>
		<!-- /.dropdown -->
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i> </a>
			<ul class="dropdown-menu dropdown-tasks">
				<li>
					<a href="#">
					<div>
						<p>
							<strong>Task 1</strong>
							<span class="pull-right text-muted">40% Complete</span>
						</p>
						<div class="progress progress-striped active">
							<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
								<span class="sr-only">40% Complete (success)</span>
							</div>
						</div>
					</div> </a>
				</li>
			</ul>
			<!-- /.dropdown-tasks -->
		</li>
		<!-- /.dropdown -->
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i> </a>
			<ul class="dropdown-menu dropdown-alerts">
				<li>
					<a href="#">
					<div>
						<i class="fa fa-comment fa-fw"></i> New Comment <span class="pull-right text-muted small">4 minutes ago</span>
					</div> </a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="#">
					<div>
						<i class="fa fa-twitter fa-fw"></i> 3 New Followers <span class="pull-right text-muted small">12 minutes ago</span>
					</div> </a>
				</li>
			</ul>
			<!-- /.dropdown-alerts -->
		</li>
		<!-- /.dropdown -->
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i> </a>
			<ul class="dropdown-menu dropdown-user">
				<li>
					<a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
				</li>
				<li class="divider"></li>
				<li>
					<a href="auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
				</li>
			</ul>
			<!-- /.dropdown-user -->
		</li>
		<!-- /.dropdown -->
	</ul>
	<!-- /.navbar-top-links -->

	<div class="navbar-default sidebar" role="navigation">
		<div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
				<li id="nav-dashbboard">
					<a href="/dashboard"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
				</li>
				<li id='nav-tasks'>
					<!-- TASKS -->
					<a href="#"><i class="fa fa-tasks fa-fw"></i>Tasks<span class="fa arrow"></span></a>
					<ul id='task-sub-level' class="nav nav-second-level collapse">
						<li id="task-inbox">
							<a href="/task/filter/inbox"><i class="fa fa-inbox"></i> Inbox</a>
						</li>
						<li>
							<a href="/task/filter/next">Next</a>
						</li>
						<li>
							<a href="/task/filter/today">Today</a>
						</li>
						<li>
							<a href="/task/filter/tomorrow">Tomorrow</a>
						</li>
						<li>
							<a href="/task/filter/scheduled"><i class="fa fa-calendar"></i> Scheduled</a>
						</li>
						<li>
							<a href="/task/filter/waiting"><i class="fa fa-clock-o"></i> Waiting</a>
						</li>
						<li>
							<a href='/task/add'><i class='fa fa-plus'> Add Task</i></a>
						</li>
					</ul>
					<!-- /.nav-second-level -->
				</li>
				<li id='nav-projects'>
					<!-- PROJECTS -->
					<a href="tables.html"><i class="fa fa-table fa-fw"></i> Projects<span class="fa arrow"></span></a>
					<ul id='project-sub-level' class="nav nav-second-level collapse">
						@foreach($projects as $project)
						<li>
							<a href="/project/{{ $project->title }}"><i class="fa fa-at"></i> {{ $project->title }}</a>
						</li>
						@endforeach
						<li>
							<a href='/project/add'><i class='fa fa-plus'> Add Project</i></a>
						</li>
					</ul>
				</li>
				<li id='nav-contexts'>
					<!-- CONTEXT -->
					<a href="#"><i class="fa fa-at fa-fw"></i> Context<span class="fa arrow"></span></a>
					<ul id='context-sub-level' class="nav nav-second-level collapse">
						@foreach($contexts as $context)
						<li>
							<a href="/context/{{$context->title}}"><i class="fa fa-at"></i> {{ $context->title }}</a>
						</li>
						@endforeach
						<li>
							<a href='/context/add'><i class='fa fa-plus'> Add Context</i></a>
						</li>
					</ul>
				</li>
				<li>
					<!-- TAG -->
					<a href="tags"><i class="fa fa-tags"></i> Tags<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse">
						@foreach($tags as $tag)
						<li>
							<a href="/tag/{{ $tag->title }}"><i class="fa fa-at"></i> {{ $tag->title }}</a>
						</li>
						@endforeach
						<li>
							<a href='/tag/add'><i class='fa fa-plus'> Add Tag</i></a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<!-- /.sidebar-collapse -->
	</div>
	<!-- /.navbar-static-side -->
</nav>
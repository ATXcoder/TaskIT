@extends('app')

@section('scripts')
<script type="text/javascript">
	//Script to update the active menu option
	$(document).ready(function() 
	{
		// Remove the active links
		$(".nav li").removeClass("active");
		
		// Collapse all sidebar containers
		$(".nav ul").removeClass("in");
		
		// Expand active sidebar container
		$("#task-sub-level").attr('aria-expanded','true');
		$("#task-sub-level").addClass("in");
		
		// Highlight active sidebar container
		$("#nav-dashboard").addClass("active");
	}); 
</script>
@stop

@section('content')
@foreach($tasks as $task)
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<a style="color: #FFFFFF; text-decoration: none;" href="/taskit/task/{{$task->id}}">
						<i class="fa fa-tasks "></i> {{ $task->title }}
						</a>
					</div>
				</div>
			</div>
			<div class="panel-body">
				{{ $task->description }}
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection
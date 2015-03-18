@extends('app')

@section('scripts')
<script type="text/javascript">
	//Script to update the active menu option
	$(document).ready(function() {
		$(".nav li").removeClass("active");
		$("#task-sub-level").attr('aria-expanded','true');
		$("#task-sub-level").addClass("collapse in")
		$("#tasks-inbox").addClass("active");
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
						<i class="fa fa-tasks "></i> {{ $task->title }}
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
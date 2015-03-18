@extends('app')

@section('banner')
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <i class="fa fa-bell"></i> You have <strong>OVERDUE</strong> tasks.
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	//Script to update the active menu option
	$(document).ready(function() 
	{
		// Remove the active links
		$(".nav li").removeClass("active");
		
		// Collapse all sidebar containers
		$(".nav ul").removeClass("in");
		
		
		
		// Highlight active sidebar container
		$("#nav-dashboard").addClass("active");
	}); 
</script>
@stop

@section('content')

<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="fa fa-tasks fa-5x"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">
							{{ $totalTask }}
						</div>
						<div>
							Tasks
						</div>
					</div>
				</div>
			</div>
			<a href="task">
			<div class="panel-footer">
				<span class="pull-left">View Details</span>
				<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				<div class="clearfix"></div>
			</div> </a>
		</div>
	</div>
@endsection
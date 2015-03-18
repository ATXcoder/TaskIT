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
		$("#project-sub-level").attr('aria-expanded','true');
		$("#project-sub-level").addClass("in");
		
		// Highlight active sidebar container
		$("#nav-projects").addClass("active");
	}); 
</script>
@stop

@section('content')

<h1>PROJECTS</h1>

@endsection
@extends('app')

@section('scripts')
<script type="text/javascript">
	$(function() {
		 $('#datetimepicker1').datetimepicker({
                    format: 'YYYY-MM-DD'
                });
	}); 
</script>
@endsection

@section('content')
@if($info != null)
<div class="alert alert-info" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{{ $info }}}</div>
<div class="row">
@endif
<div class="container-fluid">
		<div class="col-md-12 ">
			{!! Form::open(array('url'=>'/task/add')) !!}
			<div class="form-group col-md-7">
				{!! Form::label('title', 'Title') !!}
				{!! Form::text('title', null, ['class'=>'form-control']) !!}
				<br/>
				{!! Form::label('description', 'Description') !!}
				{!! Form::textarea('description', null, ['class'=>'form-control']) !!}
				<br/>
				{!! Form::label('project_id', 'Project') !!}
				{!! Form::select('project_id', $project_list, ['class'=>'form-control']) !!}
				<br/>
				<br/>
				<div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    {!! Form::text('due_date', null, ['class'=>'form-control']) !!}
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
				{!! Form::submit('Save Task',['class'=>'btn btn-primary ']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection

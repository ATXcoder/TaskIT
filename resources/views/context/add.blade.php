@extends('app')

@section('content')

@foreach ($errors->all() as $error)
<p class="error">
	{{ $error }}
</p>
@endforeach



{!! Form::open(array('url'=>'context/add')) !!}
<div class="form-group col-md-3">
	{!! Form::label('title', 'Context') !!}
	{!! Form::text('title', null, ['class'=>'form-control']) !!}
	<br/>
	{!! Form::submit('Submit',['class'=>'btn btn-primary ']) !!}
</div>
{!! Form::close() !!}
@endsection

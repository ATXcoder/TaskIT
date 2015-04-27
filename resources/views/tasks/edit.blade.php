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
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD'
            });
        });
    </script>
@stop

@section('content')
    @foreach($tasks as $task)
        <div class="row">
            <div class="col-md-12">
                {!! Form::open(array('url'=>'/task/update/'.$task->id)) !!}
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                {!! Form::text('title', $task->title, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        {!! Form::textarea('description', $task->description, ['class'=>'form-control']) !!}
                        <div class="row">
                            <hr/>
                            <div class="col-md-2">
                                <i class="fa fa-calendar"></i><b> Due Date</b>
                            </div>
                            <div class="col-md-3">
                                <div class='input-group date' id='datetimepicker1'>
                                    {!! Form::text('due_date', $task->due_date, ['class'=>'form-control']) !!}
                                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                     </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <hr/>
                            <div class="col-md-2">
                                <i class="fa fa-sitemap"></i><b> Project</b>
                            </div>
                            <div class="col-md-4">
                                {!! Form::select('project_id', array('default' => $task->project) + $project_list,['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <br/>
                            <div class="col-md-2">
                                <i class="fa fa-at"></i><b> Context</b>
                            </div>
                            <div class="col-xs-3">
                                {{ $task->context }}
                            </div>
                        </div>
                        <br/>
                        {!! Form::submit('Update Task',['class'=>'btn btn-primary ']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    @endforeach
@endsection
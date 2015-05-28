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
@stop

@section('content')
    @foreach($tasks as $task)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                <a style="color: #FFFFFF; text-decoration: none;" href="/task/{{$task->id}}">
                                    <i class="fa fa-tasks "></i> {{ $task->title }}
                                </a>
                                <a style="margin-left: 6px; color: #FFFFFF; text-decoration: none;" href="/task/edit/{{$task->id}}">
                                    <i class="fa fa-lg fa-pencil"></i>
                                    </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        {{ $task->description }}
                        <div class="row">
                            <hr/>
                            <div class="col-md-2">
                               <i class="fa fa-calendar"></i><b> Due Date</b>
                            </div>
                            <div class="col-md-3">
                                {{ $task->due_date }}
                            </div>
                        </div>

                        <div class="row">
                            <hr/>
                            <div class="col-md-2">
                                <i class="fa fa-sitemap"></i><b> Project</b>
                            </div>
                            <div class="col-md-3">
                                {{ $task->project }}
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
                    </div>

                </div>
            </div>
        </div>
    @endforeach
@endsection
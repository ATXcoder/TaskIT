@extends('app')

@section('scripts')
    <script type="text/javascript">
        //Script to update the active menu option
        $(document).ready(function()
        {
            // Remove the active links
            $(".nav li").removeClass("active");

            // Collapse all sidebar containers
            $('.nav ul').removeClass("in");

            // Expand active sidebar container
            $("#context-sub-level").attr('aria-expanded','true').addClass("in");

            // Highlight active sidebar container and points the arrow down
            $("#nav-contexts").addClass("active");
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
                                <a style="color: #FFFFFF; text-decoration: none;" href="/task/{{$task->id}}">
                                    @if($task->complete == 0)
                                        <i class="fa fa-tasks "></i> {{ $task->title }}
                                    @else
                                        <span class="fa-stack ">
                                    <i class="fa fa-circle fa-stack-2x" style="color: green;"></i>
                                     <i class="fa fa-check fa-stack-1x" style="color: white;"></i>
                                </span>
                                        {{ $task->title }}
                                    @endif

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
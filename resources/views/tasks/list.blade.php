@extends('app')

@section('scripts')
    <script type="text/javascript">
        //Script to update the active menu option
        $(document).ready(function () {
            // Remove the active links
            $(".nav li").removeClass("active");

            // Collapse all sidebar containers
            $(".nav ul").removeClass("in");

            // Expand active sidebar container
            $("#task-sub-level").attr('aria-expanded', 'true');
            $("#task-sub-level").addClass("in");

            // Highlight active sidebar container
            $("#nav-dashboard").addClass("active");
        });
    </script>
    <script>
        $(document).on("contextmenu", ".panel-heading", function (e) {
            // Prevent the context menu
            event.preventDefault();

            // Get Task ID
            var taskID = this.id;

            // Build Context Menu
            var completeTask = "<div><form method='post' action='task/complete/" + taskID + "'><input type='submit' name='complete' value='Complete Task'/></form></div>"
            var deleteTask = "<div><form method='post' action='task/delete/" + taskID + "'><input type='submit' name='delete' value='Delete Task'/></form></div>"

            $("<div class='custom-menu'>" + completeTask + deleteTask + "</div>")
                    .appendTo("body")
                    .css({top: event.pageY + "px", left: event.pageX + "px"});
            return false;
        });

        $(document).bind("click",function(){
            $("div.custom-menu").hide();
        });
    </script>
@stop

@section('css')
    <style>
        .custom-menu {
            z-index:1000;
            position: absolute;
            background-color:#ffffee;
            border: 1px solid black;
            padding: 2px;
            text-decoration: none;
            color: #000000;
        }

        .custom-menu a{
            text-decoration: none;
            color: #000000;
        }

        .custom-menu a:hover{
            text-decoration: none;
            color: #000000;
        }

        .custom-menu div{
            margin-bottom: 5px;
        }

        input[type=submit] {
            background:#ffffff;
            border:0 none;
            border-radius: 5px;
            width: 100%;
            text-align: left;
        }
    </style>
@stop

@section('content')
    @foreach($tasks as $task)
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading" id="{{$task->id}}">
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
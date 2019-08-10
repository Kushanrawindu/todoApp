<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Task App</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1>Daily Tasks</h1>

            <div class="row">
                <div class="col-md-12">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                    <form action="/saveTask" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="text" class="form-control" name="task" placeholder="Enter your Task Here">
                        <br>

                        <input type="submit" class="btn btn-primary" value="SAVE">
                        <input type="button" class="btn btn-warning" value="CLEAR">
                        <br>
                        <br>
                    </form>

                    <table class="table table-dark">
                        <th>ID</th>
                        <th>Task</th>
                        <th>Complete</th>
                        <th>Action</th>

                        @foreach ($tasks as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td>{{$task->task}}</td>
                            <td>
                                @if($task->iscompleted)
                                <button class="btn btn-success">Completed</button>
                                @else
                                <button class="btn btn-warning">Not Completed</button>
                                @endif
                            </td>
                            <td>
                            

                                @if($task->iscompleted == 0)
                                    
                                <form action="/markascompleted/{{$task->id}}">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <button type="submit"  class="btn btn-primary">Mark As Completed</button>
                                </form>


                                @elseif($task->iscompleted == 1)

                                <form action="/markasnotcompleted/{{$task->id}}">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <button type="submit"  class="btn btn-danger">Mark As Not Completed</button>
                                </form>


                                @endif


                                <form action="/deletetask/{{$task->id}}" method="POST" display:inline;">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-warning">Delete</button>
                                </form>
                               
                            </td>
                        </tr>
                        @endforeach
                        
                    </table>
                </div>
            </div>
        </div>


    </div>
</body>
</html>
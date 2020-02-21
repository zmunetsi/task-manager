@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{$project->name}}</h2>

                    <li class="d-flex justify-content-between align-items-center">
                        
                           <a href = "/tasks/create?project_id={{$project->id}}"><span class="badge badge-primary badge-pill">Add new task</span></a>
                          </li>
                        

                </div>

                <div class="card-body">
                       @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class = "ajax-success"></div>


                    <ul id = "sortable-items" class="list-group">

                  <button type="button" class="list-group-item list-group-item-action active">
                    Tasks
                  </button>

                  @foreach($project->tasks as $task)

                      <li data-id="{{{ $task->id }}}" class="draggable list-group-item d-flex justify-content-between align-items-center">
                        {{$task->name}}
                        <a href = "{{route('tasks.edit',$task)}}" class="badge badge-primary badge-pill">Edit</a>
                        
                         <form method="POST" action="/tasks/{{$task->id}}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        
                            <button style = "border:none;" type="submit" class="badge badge-danger badge-pill">
                                delete
                            </button>
                    </form>
                      </li>

                    @endforeach
                   
                    </ul>

                 
                </div>
            </div>


             
    
        </div>
    </div>
</div>


@endsection



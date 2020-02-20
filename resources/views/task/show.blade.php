@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{$project->name}}</h2>

                    <li class="d-flex justify-content-between align-items-center">
                        
                           <a href = "{{route('tasks.create',$project)}}"><span class="badge badge-primary badge-pill">Add new task</span></a>
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


                    <ul class="list-group">

                  <button type="button" class="list-group-item list-group-item-action active">
                    Tasks
                  </button>
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        Task 1
                        <span class="badge badge-primary badge-pill">Edit</span>
                        
                        <span class="badge badge-warning badge-pill">Urgent</span>
                        <span class="badge badge-danger badge-pill">Delete</span>
                      </li>
                   
                    </ul>

                 
                </div>
            </div>


             
    
        </div>
    </div>
</div>
@endsection

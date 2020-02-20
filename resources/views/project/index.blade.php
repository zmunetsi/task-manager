@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

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

                    <a href="{{route('projects.create')}}">Create new project</a>
                </div>
            </div>

            @foreach ($all_projects as $project)

             

                <div class="card gedf-card">

                    <div class="accordion" id="accordionExample">
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h2 class="mb-0">
                        
                          <li class="d-flex justify-content-between align-items-center">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse-{{ $project->id}}" aria-expanded="true" aria-controls="collapseOne">
                           <h2>{{$project->name}}</h2>
                           </button>
                           <a href = "{{route('projects.show',$project)}}"><span class="badge badge-primary badge-pill">View Project</span></a>
                          </li>
                        
                      </h2>
                    </div>

                        <div id="collapse-{{ $project->id}}" class="collapse hide" aria-labelledby="headingOne" data-parent="#accordionExample">
                          <div class="card-body">
                          {{ $project->description }}
                          </div>
                        </div>
                      </div>
                      

                    </div>
                    
                </div>
         



                 @endforeach


               

             

                <div class="card gedf-card">
                    
                </div>
         
    
        </div>
    </div>
</div>
@endsection

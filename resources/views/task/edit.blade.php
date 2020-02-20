@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit post') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tasks.update', $task) }}">
                        @csrf

                         {{method_field('PATCH')}}

                        <div class="form-group row">
                            <label for="task-name" ></label>

                            <div class="col-md-12">
                                <input id="task-name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($task) ? $task->name: old('name') }}" required autocomplete="name" autofocus placeholder="Task name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                         <!-- Submit Form Input -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">Submit</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

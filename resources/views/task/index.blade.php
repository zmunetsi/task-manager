

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create post') }}</div>

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
                   <form method="POST" action="{{ route('posts.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="first-name" ></label>

                            <div class="col-md-12">
                                <textarea id="post_content" type="text" class="form-control @error('post_content') is-invalid @enderror" name="post_content" value="{{ old('first_name') }}" required autocomplete="post-content" autofocus placeholder="Write Something">
                                    
                                </textarea>

                                @error('post_content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 d-flex">
                          <div class="p-2">Flex item</div>
                          <div class="p-2">Flex item</div>
                          <div class="ml-auto p-2">


                            <button type="submit" class="btn btn-primary">
                                    {{ __('Share') }}
                           </button><br/><br/>


                          </div>

                       

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

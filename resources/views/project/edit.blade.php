@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit post') }}</div>

                <div class="card-body">
                   <form method="POST" action="{{ route('posts.edit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="post-content" ></label>

                            <div class="col-md-12">
                                <textarea id="post-content" type="text" class="form-control @error('first_name') is-invalid @enderror" name="post_content" value="{{ old('post_content') }}" required autocomplete="post-content" autofocus placeholder="Write Something">
                                    
                                </textarea>

                                @error('post_content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-12">
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

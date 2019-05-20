@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome {{Auth::user()->name}}, you are logged in!
                </div>
                
            </div>
            <br><br>

            <div class="card">
                <div class="card-header">Upload/Post Articles</div>

                <div class="card-body">
                    <form method="POST" action="{{url('/home')}}" enctype="multipart/form-data">
                        
                        @isset($result)
                        <div class="form-group row">
                            {{-- <label for="title" class="col-md-4 col-form-label text-md-right"></label> --}}

                            <div class="col-md-6 offset-md-4">
                                <h4>{{$result}}</h4>
                            </div>
                        </div>
                        @endisset

                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>

                            <div class="col-md-6">
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" required>
                                
                                </textarea>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photos" class="col-md-4 col-form-label text-md-right">Upload Photo<br> (you can select multiple photos)</label>

                            <div class="col-md-6">
                                <input type="file" multiple class="form-control @error('photos') is-invalid @enderror" name="photos[]" required>

                                @error('photos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tags" class="col-md-4 col-form-label text-md-right">Tags<br>(comma separated)</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('tags') is-invalid @enderror" name="tags[]" required>

                                @error('tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Upload Articles
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@stop

@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/profile/{{$user->id}}/edit" enctype="multipart/form-data" method="post">

            @csrf
            @method('put')
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>Edit Profile</h1>
                    </div>
                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label ">Title :</label>

                        {{-- <div class="col-md-6"> --}}
                            <input  id="title"
                                    type="text"
                                    class="form-control {{$errors->has('title') ? 'is_invalid' : ''}}"
                                    name="title"
                                    value="{{ old('title') ?? $user->profile->title  }}"
                                    autocomplete="title" autofocus>

                            @if($errors->has('title'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif

                        {{-- </div> --}}
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label ">Description :</label>

                        {{-- <div class="col-md-6"> --}}
                            <input  id="description"
                                    type="text"
                                    class="form-control {{$errors->has('description') ? 'is_invalid' : ''}}"
                                    name="description"
                                    value="{{ old('description') ?? $user->profile->description  }}"
                                    autocomplete="description" autofocus>

                            @if($errors->has('description'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif

                        {{-- </div> --}}
                    </div>

                    <div class="row mb-3">
                        <label for="url" class="col-md-4 col-form-label ">Url :</label>

                        {{-- <div class="col-md-6"> --}}
                            <input  id="url"
                                    type="text"
                                    class="form-control {{$errors->has('url') ? 'is_invalid' : ''}}"
                                    name="url"
                                    value="{{ old('url') ?? $user->profile->url }}"
                                    autocomplete="url" autofocus>

                            @if($errors->has('url'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('url') }}</strong>
                            </span>
                            @endif

                        {{-- </div> --}}
                    </div>

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label ">Profile Image :</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @if($errors->has('image'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                            @endif
                    </div>

                    <div class=" pt-4">
                        <button type="submit" class="btn btn-primary">Save Profile</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection

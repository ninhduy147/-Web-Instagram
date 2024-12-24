@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="/p" enctype="multipart/form-data" method="post">

            @csrf
            <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1>Add New Post</h1>
                    </div>
                    <div class="row mb-3">
                        <label for="caption" class="col-md-4 col-form-label ">Caption :</label>

                        {{-- <div class="col-md-6"> --}}
                            <input  id="caption"
                                    type="text"
                                    class="form-control {{$errors->has('caption') ? 'is_invalid' : ''}}"
                                    name="caption"
                                    value="{{ old('caption') }}"
                                    autocomplete="caption" autofocus>

                            @if($errors->has('caption'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('caption') }}</strong>
                            </span>
                            @endif

                        {{-- </div> --}}
                    </div>

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label ">Image :</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @if($errors->has('image'))
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                            @endif
                    </div>

                    <div class="row pt-4">
                        <button type="submit" class="btn btn-primary">Add New Post</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection

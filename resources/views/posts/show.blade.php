@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="{{Storage::Url($post->image)}}" width="100%"  alt="">
            </div>
            <div class="col-4">
                <div>
                    <div class="d-flex">
                        <div >
                            <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100" style="max-width:40px" alt="">
                        </div>
                        <div class="ps-2">
                            <div class="fw-bold pt-1">
                                <a style="text-decoration:none;" href="/profile/{{$post->user->id}}">
                                    <span class="text-dark">{{$post->user->username}}</span>
                                </a>
                                <a style="text-decoration:none;" href="#" class="pl-3 ps-3">Follow</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <p>
                        <span class="fw-bold pt-1 pe-2">
                            <a style="text-decoration:none;" href="/profile/{{$post->user->id}}">
                                <span class="text-dark">{{$post->user->username}}</span>
                            </a>
                        </span>{{$post->caption}}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

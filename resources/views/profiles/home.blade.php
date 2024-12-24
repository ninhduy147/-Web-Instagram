@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img class="rounded-circle" width="200px" src="{{$user->profile->profileImage()}}" class="w-100" style="width:250px; height:250px">
            {{-- <img class="rounded-circle" width="200px" src="{{Storage::Url($user->profile->image)}}" class="w-100" alt=""> --}}
        </div>
        <div class="col-9" style="margin-top:40px">
            <div class="d-flex ">
                <h1>{{$user->username}}</h1>
               @can('update', $user->profile)
                    <a class="pt-1 ps-5" style="margin-left: 120px" href="/p/create">
                        <button class="btn btn-primary">Add New Post</button>
                    </a>
               @endcan
                {{-- @can('update', $user) --}}
                @if(auth()->check())
                    @if(auth()->user()->id !== $user->id)
                        @if(auth()->user()->following->contains($user->id))
                            <form class="ps-3 pt-1" action="{{ route('unfollow', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary" type="submit">Unfollow</button>
                            </form>
                        @else
                            <form class="ps-3 pt-1" action="{{ route('follow', $user->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-primary" type="submit">Follow</button>
                            </form>
                        @endif
                    @endif
                @endif


                {{-- @endcan --}}


            </div>
            @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pe-4"><strong>{{$user->posts->count()}}</strong>post</div>
                <div class="pe-4"><strong>{{$user->followers->count()}}</strong>followers</div>
                <div class="pe-4"><strong>{{$user->following->count()}}</strong>following</div>
            </div>
            <div>{{$user->profile->title}}</div>
            <div>
                {{$user->profile->description}}
            </div>
            {{-- <div>
            </div> --}}
            <div>
                <a href="#">{{$user->profile->url}}</a>
            </div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $value)
            <div class="col-4 pb-4c">
                <a href="/p/{{$value->id}}"><img src="{{Storage::Url($value->image)}}" width="100%" height="400px" class="pt-4" alt=""></a>
            </div>
        @endforeach
    </div>
</div>
@endsection

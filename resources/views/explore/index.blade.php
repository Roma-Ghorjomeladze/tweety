@extends('layouts.app')

@section('content')
<div>
    <h2 class="mb-8 font-bold text-xl">Explore To Follow</h2>
    @foreach($users as $user)
        <a class="flex items-center mb-5" href="{{$user->path()}}">
            <img src="{{$user->avatar}}" width="60" class="mr-4 rounded-full" style="object-fit: contain" alt="avatar">
            <div>
                <h4 class="font-bold">{{'@'.$user->username}}</h4>
            </div>
        </a>
    @endforeach
</div>
@endsection

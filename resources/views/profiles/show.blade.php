@extends('layouts.app')

@section('content')
    <div class="border border-gray-300 rounded-lg px-2">
        <img style="width: 100%; height: 200px"
             src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSotgqABNQ6mdTL07zVFXq-JTuGQ1IDLXSNxg&usqp=CAU"
             alt="background">
        <div class="flex justify-between items-center" style="margin-top: -40px">
            <div>
                <h2 class="font-bold">{{$user->name}}</h2>
                <span>{{$user->created_at->diffForHumans()}}</span>
                <p class="text-xs">{{$user->email}}</p>
            </div>
            <img class="mr-2" style="width: 150px; height: 150px;  object-fit: cover; border-radius: 100%"
                 src="{{$user->avatar}}" alt="profile">

            <div class="flex">
                @unless(current_user()->is($user))
                    <form class="mr-3" method="POST" action="{{$user->path()}}/follow">
                        @csrf
                        <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white text-xs">{{current_user()->following($user) ? 'Unfollow Me' : 'Follow Me'}}</button>
                    </form>
                @endunless
                @can('edit', $user)
                    <a href="{{$user->path('edit')}}" class="bg-white border border-gray-500 text-black rounded-lg shadow py-2 px-2 text-xs ">Edit
                        Profile
                    </a>
                @endcan

            </div>
        </div>
        <div style="text-align: center">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi dolor eius illum iure numquam quasi sed! Ad
            aliquam blanditiis deleniti excepturi, minima nesciunt odio quos ratione recusandae sint vel veritatis.
        </div>
    </div>
    @include('_timeline')
@endsection

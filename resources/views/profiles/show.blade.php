@extends('layouts.app')

@section('content')
    <div class="border border-gray-300 rounded-lg px-2">
        <img style="width: 100%; height: 200px"
             src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSotgqABNQ6mdTL07zVFXq-JTuGQ1IDLXSNxg&usqp=CAU"
             alt="">
        <div class="flex justify-between items-center" style="margin-top: -40px">
            <div>
                <h2 class="font-bold">{{$user->name}}</h2>
                <span>{{$user->created_at->diffForHumans()}}</span>
            </div>
            <img class="mr-2" style="width: 150px; border-radius: 100%"
                 src="https://i.kym-cdn.com/photos/images/newsfeed/001/053/259/ebd.jpg" alt="profile">

            <div>
                <button class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white text-xs">Follow me</button>
                <button class="bg-white border border-gray-500 text-black rounded-lg shadow py-2 px-2 text-xs ">Edit
                    Profile
                </button>
            </div>
        </div>
        <div style="text-align: center">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi dolor eius illum iure numquam quasi sed! Ad
            aliquam blanditiis deleniti excepturi, minima nesciunt odio quos ratione recusandae sint vel veritatis.
        </div>
    </div>
    @include('_timeline')
@endsection

@extends('layouts.app')

@section('content')
    <form enctype="multipart/form-data" method="POST" action="{{$user->path()}}">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
            <input class="w-full" value="{{$user->name}}" name="name"  id="name" required type="text">
            @error('name')
                <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">Username</label>
            <input class="w-full" value="{{$user->username}}" name="username"  id="username" required type="text">
            @error('username')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
            <input class="w-full" value="{{$user->email}}" name="email"  id="email" required type="email">
            @error('email')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
            <input class="w-full"  name="password"  id="password" required type="password">
            @error('password')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">Confirm Password</label>
            <input class="w-full" name="password_confirmation"  id="password_confirmation" required type="password">
            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="avatar" class="block mb-2 uppercase font-bold text-xs text-gray-700">Avatar</label>
            <div class="flex items-center">
                <input style="background: white; border: 1px solid black; border-right: none" class="w-full py-3" name="avatar"  id="avatar" type="file">
                <img style="border: 1px solid black; border-left: none" src="{{$user->avatar}}" alt="avatar" width="40">
            </div>
            @error('avatar')
            <p class="text-red-500 text-xs mt-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <button class="px-8 py-2 bg bg-blue-500 text-white mt-2 rounded-2xl shadow" style="outline: none" type="submit">Save</button>
        </div>
    </form>
@endsection

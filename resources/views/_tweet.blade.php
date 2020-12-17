<div class="flex mb-5 border-b border-b-gray pb-5">
    <a href="{{$tweet->user->path()}}">
        <img class="rounded-full mr-2" src="{{$tweet->user->avatar}}" alt="friend">
    </a>
    <div>
        <a href="{{$tweet->user->path()}}">
            <h5 class="font-bold mb-4">{{$tweet->user->name}}</h5>
        </a>
        <p class="text-sm">
            {{$tweet->body}}
        </p>
    </div>
</div>

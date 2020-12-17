<li class="friends_li">
    <div class="flex friends_li">
        <a class="flex items-center" href="{{$user->path()}}">
            <img class="rounded-full mr-2" src= "{{$user->avatar}}" alt="friend">
            <span class="text-sm">{{$user->name}}</span>
        </a>
    </div>
</li>

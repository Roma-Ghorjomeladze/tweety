<li class="friends_li">
    <div class="flex friends_li">
        <a class="flex items-center" href="{{$user->path()}}">
            <img class="rounded-full mr-2" style="width: 40px; height: 40px; object-fit: cover" src= "{{$user->avatar}}" alt="friend">
            <span class="text-sm">{{$user->name}}</span>
        </a>
    </div>
</li>

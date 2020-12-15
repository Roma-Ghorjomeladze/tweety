<h3 class="text-bold font-lg">Following</h3>
<ul class="friends_ul">
    @foreach(auth()->user()->follows as $user)
        <li class="friends_li">
            <div class="flex friends_li">
                <a class="flex items-center" href="{{route('profile', $user->name)}}">
                    <img class="rounded-full mr-2" src= "{{$user->avatar()}}" alt="friend">
                    <span class="text-sm">{{$user->name}}</span>
                </a>
            </div>
        </li>
    @endforeach
</ul>

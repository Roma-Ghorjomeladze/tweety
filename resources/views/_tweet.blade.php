<div class="flex mb-5 border-b border-b-gray pb-5 relative">
    <a style="min-width: 45px; margin-right: 8px" href="{{$tweet->user->path()}}">
        <img class="rounded-full mr-2" style="width: 50px; height: 50px;  object-fit: cover;" src="{{$tweet->user->avatar}}" alt="friend">
    </a>
    <div>
        <a href="{{$tweet->user->path()}}">
            <h5 class="font-bold mb-4">{{$tweet->user->name}}</h5>
        </a>
        <p class="text-sm">
            {{$tweet->body}}
        </p>
        <div class="flex">
            <form method="post" action="tweet/{{$tweet->id}}/like">
                @csrf
                <div class="flex mr-2 items-center">
                    <button class="mr-1 text-white bg-blue-500 p-1 rounded-lg text-sm {{$tweet->isLikedBy(current_user()) ? 'active_liked': ''}}">like</button>
                    <span>{{$tweet->likes ?: 0}}</span>
                </div>
            </form>
            <form method="post" action="tweet/{{$tweet->id}}/dislike">
                @csrf
                <div class="flex mr-2 items-center">
                    <button class="mr-1 text-white bg-gray-400 p-1 rounded-lg text-sm {{$tweet->isDislikedBy(current_user()) ? 'active_liked': ''}}">dislike</button>
                    <span>{{$tweet->dislikes ?: 0}}</span>
                </div>
            </form>
        </div>
    </div>
    @can('delete', $tweet)
        <form method="POST" action="/tweet/{{$tweet->id}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn">DEL</button>
        </form>
    @endcan
</div>

<h3 class="text-bold font-lg font-bold">Followings</h3>
<ul class="friends_ul">
    @forelse(current_user()->follows as $user)
        @include('_friend')
    @empty
        <p class="p-1"> No friends yet</p>
    @endforelse
</ul>

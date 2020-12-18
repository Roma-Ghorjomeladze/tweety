<h3 class="font-lg mt-5 font-bold">Users To Follow</h3>
<ul class="friends_ul">
    @foreach(current_user()->suggestions(current_user()) as $user)
        @include('_friend')
    @endforeach
</ul>

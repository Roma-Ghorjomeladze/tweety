<div class="border border-blue-400 rounded-lg px-8 py-6 mb-20">
    <form method="POST" action="tweets">
        @csrf
        <textarea
            name="body"
            class="w-full border-none"
            placeholder="What's up doc?"
            required
        ></textarea>
        <hr class="my-4">
        <footer class="flex justify-between">
            <img class="rounded-full mr-2" src="{{auth()->user()->avatar()}}" alt="friend">
            <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Tweet-a-roo!</button>
       </footer>
    </form>

    @error('body')
        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
    @enderror
</div>

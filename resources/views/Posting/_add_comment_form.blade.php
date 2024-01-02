@auth

    <form method="POST" action="/post/{{ $posts->id }}/comments" class="border border-gray-200 p-6 rounded-xl">
        @csrf
        <header class="flex item-center">

            <h2 class="ml-4">comment here</h2>
        </header>
        <div class="mt-5">
            <textarea name="body"
                class="w-full text-sm focus:outline-none focus:ring focus:border-blue-300 border-gray-300 rounded-md p-2"
                rows="5" placeholder="Share your thoughts" required></textarea>
            @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <button type="submit"
                class="transition-colors duration-300 bg-blue-700 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-2 px-4">post</button>

        </div>

    </form>
@else
    <p>
        <a href="/login" class="hover:underline"> login</a> or <a href="/register"
            class="hover:underline">register</a> to leave a comment.
    </p>
@endauth

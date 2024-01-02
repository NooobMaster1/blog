@props(['posts'])
<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5">
        <div>
            <img src="{{asset('storage/' . $posts->thumbnail)}}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                @include('posting._categoryButton', ['posts' => $posts])

                <div class="mt-4">
                    <a href="/post/{!! $posts->id !!}">
                        <h1 class="text-3xl">
                            {!! $posts->title !!}
                        </h1>

                        <span class="mt-2 block text-gray-400 text-xs">
                            Published <time>{!! $posts->created_at->diffForHumans() !!}</time>
                        </span>
                </div>
            </header>

            <div class="text-sm mt-4">


                <p class="mt-4">
                    {!! $posts->excerpt !!}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div> <!-- Updated: User on the left side -->
                    @include('posting._user-detail-footer', ['userId' => $posts->user_id, 'userName' => $posts->User->name])
                </div>

                <div>
                    <a href="/post/{{ $posts->id }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">
                        Read More
                    </a>
                </div>
            </footer>

        </div>
    </div>
</article>

@props(['comments'])


    <article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4 mt-5">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u= {{$comments->user_id}}" alt="" width="60" height="60" class="rounded-xl">

        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comments->User->name }}</h3>
                <p class="text-xs mb-4">
                    {{ $comments->created_at->diffForHumans() }}
                </p>
                <p>{{$comments->body}}</p>

            </header>
        </div>
    </article>



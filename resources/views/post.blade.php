@extends('layout')

@section('content')
    <section class="px-6 py-8">

        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="{{ asset('storage/' . $posts->thumbnail) }}" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{ $posts->created_at->diffForHumans() }}</time>
                    </p>

                    <div class="ml-3">
                        @include('posting._user-detail-footer', [
                            'userId' => $posts->user_id,
                            'userName' => $posts->User->name,
                            'simpleAcnhor' => true,
                        ])

                    </div>
                </div>
                </div>


                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">

                            @include('posting._backarrow')

                            Back to Posts
                        </a>

                        <div class="space-x-2">

                            @include('posting._categoryButton', ['posts' => $posts])

                        </div>

                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {!! $posts->excerpt !!}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {!! $posts->body !!}
                    </div>
                    <form action="{{ route('stars.store', ['posts' => $posts->id]) }}" method="POST" class="mt-6">
                        @csrf
                        <div class="rating">
                            <input type="radio" id="star5" name="rating" value="5"
                                {{ $posts->rating == 5 ? 'checked' : '' }} />
                            <label for="star5"></label>
                            <input type="radio" id="star4" name="rating" value="4"
                                {{ $posts->rating == 4 ? 'checked' : '' }} />
                            <label for="star4"></label>
                            <input type="radio" id="star3" name="rating" value="3"
                                {{ $posts->rating == 3 ? 'checked' : '' }} />
                            <label for="star3"></label>
                            <input type="radio" id="star2" name="rating" value="2"
                                {{ $posts->rating == 2 ? 'checked' : '' }} />
                            <label for="star2"></label>
                            <input type="radio" id="star1" name="rating" value="1"
                                {{ $posts->rating == 1 ? 'checked' : '' }} />
                            <label for="star1"></label>
                        </div>
                        <div class="move-left">
                            <button type="submit"
                                class="transition-colors duration-300 bg-blue-700 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-2 px-4">
                                Submit Rating
                            </button>
                        </div>
                    </form>
                </div>


                <section class="col-span-8 col-start-5 mt-10">

                    @include('posting._add_comment_form')

                    @foreach ($posts->Comment as $comments)
                        @include('posting._comment', ['comments' => $comments])
                    @endforeach

                </section>

            </article>

        </main>


    </section>
@endsection

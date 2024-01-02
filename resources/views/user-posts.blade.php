@extends('layout')

@section('content')
    @include('posting._post-header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if ($posts->count())
            @include('post-featured', ['posts' => $posts[0]])
            @if ($posts->count() > 1)
                <div class="lg:grid lg:grid-cols-6">

                    @foreach ($posts->skip(1) as $post)
                        <div class="{{ $loop->iteration < 3 ? 'col-span-3' : 'lg:col-span-2' }}">
                            @include('post-card', ['posts' => $post])
                        </div>
                    @endforeach
                </div>
            @endif

        @endif
    </main>
@endsection

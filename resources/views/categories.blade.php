@extends('layout')


@section('banner')
    <h1>
        my blog
    </h1>
@endsection

@section('content')
      @foreach ($posts as $post)
        <article>

            <h1> {!! $post->title !!}</h1>
             <p>
                by <a href="/user/">{{ $post->User->name }}</a>
                <a href="/categories/{{ $post->Category->slug }}">{{ $post->Category->Category_name }}</a>
            </p>
            <div>{!! $post->body !!}</div>
        </article>
       @endforeach

    <a href="/">go back</a>
@endsection

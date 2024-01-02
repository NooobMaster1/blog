@extends('layout')

@section('content')
    <!-- component -->
    <div class="text-gray-900">
        <div class="p-4 flex">
            <h1 class="text-3xl">
                Posts
            </h1>
        </div>

        <div class="px-3 py-4 flex justify-center">
            <table class="w-full text-md bg-white shadow-md rounded mb-4">

                <tbody>

                    <tr class="border-b">
                        <th class="text-left p-3 px-5">title</th>
                        <th class="text-left p-3 px-5">category</th>
                        <th class="text-left p-3 px-5">excerpt</th>
                        <th class="text-left p-3 px-5">published at</th>

                        <th></th>
                    </tr>
                    @foreach ($posts as $post)
                        <tr class="border-b hover:bg-orange-100 bg-gray-100">
                            <td class="p-3 px-5">
                                <a href="/post/{{ $post->id }}">
                                    <p> {!! $post->title !!} </p>
                                </a>
                            </td>
                            <td class="p-3 px-5">
                                <p>{{ $post->Category->Category_name }} </p>
                            </td>
                            <td class="p-3 px-5">
                                <p>{{ $post->excerpt }} </p>
                            </td>
                            <td class="p-3 px-5">
                                <p>{{ $post->created_at }} </p>
                            </td>
                            <td class="p-3 px-5 flex justify-end">
                                <a href="/editPost/{{ $post->id }}">
                                    <button type="button"
                                        class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                        Edit
                                    </button>
                                </a>
                            </td>
                            <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <td>
                                    <button type="submit"
                                        class="text-sm bg-red-500 hover:bg-red-700
                                text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                                </td>
                            </form>
                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    </div>
@endsection

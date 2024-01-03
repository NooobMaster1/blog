@extends('layout')

@section('content')
    <div class="text-gray-900">
        <div class="p-4 flex">
            <h1 class="text-3xl">
                users
            </h1>
        </div>

        <div class="px-3 py-4 flex justify-center">
            <table class="w-full text-md bg-white shadow-md rounded mb-4">

                <tbody>

                    <tr class="border-b">
                        <th class="text-left p-3 px-5">id</th>
                        <th class="text-left p-3 px-5">name</th>
                        <th class="text-left p-3 px-5">email</th>


                        <th></th>
                    </tr>
                    @foreach ($users as $user)
                        <tr class="border-b hover:bg-orange-100 bg-gray-100">
                            <td class="p-3 px-5">
                                <p> {{ $user->id }} </p>
                            </td>
                            <td class="p-3 px-5">
                                <p>{{ $user->name }} </p>
                            </td>
                            <td class="p-3 px-5">
                                <p>{{ $user->email }} </p>
                            </td>
                            {{-- <td class="p-3 px-5">
                            <p>#</p>
                        </td>
                        <form action="{{ route('posts.destroy', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <td>
                                <button type="submit"
                                    class="text-sm bg-red-500 hover:bg-red-700
                            text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</button>
                            </td>
                        </form> --}}
                        </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    </div>
@endsection

@extends('layout')

@section('content')
    <section class="px-6 py-8">
        <div class="container">
            <h1>Edit post</h1>
            <form method="POST" action="{{ route('posts.edit', ['id' => $posts->id]) }}" enctype="multipart/form-data">
                @csrf

                <input class="form-input" type="text" name="title" id="title" value="{!! $posts->title !!}" >
                @error('title')
                    <p class="form-error">{{ $message }}</p>
                @enderror

                <input class="form-input" type="text" name="slug" id="slug" value="{!! $posts->slug !!}"
                    >
                @error('slug')
                    <p class="form-error">{{ $message }}</p>
                @enderror
                <input class="form-input" type="text" name="excerpt" id="excerpt"
                    value="{!! $posts->excerpt !!}" >
                @error('excerpt')
                    <p class="form-error">{{ $message }}</p>
                @enderror

                <div class="flex mt-6">
                    <div class="flex-1">
                        <input class="form-input" type="file" name="thumbnail" id="thumbnail"
                            value="{{ $posts->thumbnail }}" >
                    </div>
                    <img class="rounded-xl ml-6" width="80" src="{{ asset('storage/' . $posts->thumbnail) }}">
                    @error('thumbnail')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>


                <textarea class="form-input" name="body" id="body" placeholder="Body" required>{!! $posts->body !!}</textarea>
                @error('body')
                    <p class="form-error">{{ $message }}</p>
                @enderror
                <div class="relative flex lg:inline-flex items-center bg-gray-200 rounded-xl mt-3">
                    <select name="category" id="category_id"
                        class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold ">


                        {{ $currentCategory = old('category_id', $posts->category_id) }}


                        <option value="{{ $posts->category->id }}" selected>{{ $posts->category->Category_name }}</option>

                        @foreach (\App\Models\Category::where('id', '!=', $posts->category->id)->get() as $category)
                            <option value="{{ $category->id }}" {{ $currentCategory == $category->id ? 'selected' : '' }}>
                                {{ $category->Category_name }}
                            </option>
                        @endforeach
                    </select>

                </div>

                <input class="form-submit" type="submit" value="edit">
            </form>
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <p class="text-red-500 text-xs"> {{ $error }}</p>
                    @endforeach
                </ul>
            @endif
        </div>
    </section>

@endsection

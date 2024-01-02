@extends('layout')

@section('content')
    <section class="px-6 py-8">
        <div class="container">
            <h1>Create a post</h1>
            <form method="POST" action="/admin/post" enctype="multipart/form-data">
                @csrf

                <input class="form-input" type="text" name="title" id="title" placeholder="Title"
                    value="{{ old('title') }}" required>
                @error('title')
                    <p class="form-error">{{ $message }}</p>
                @enderror

                <input class="form-input" type="text" name="slug" id="slug" placeholder="Slug"
                    value="{{ old('slug') }}" required>
                @error('slug')
                    <p class="form-error">{{ $message }}</p>
                @enderror

                <input class="form-input" type="file" name="thumbnail" id="thumbnail" placeholder="thumbnail"
                    value="{{ old('thumbnail') }}" required>
                @error('thumbnail')
                    <p class="form-error">{{ $message }}</p>
                @enderror



                <input class="form-input" type="text" name="excerpt" id="excerpt" placeholder="Excerpt"
                    value="{{ old('excerpt') }}" required>
                @error('excerpt')
                    <p class="form-error">{{ $message }}</p>
                @enderror



                <input class="form-input" type="text" name="body" id="body" placeholder="Body" required>
                @error('body')
                    <p class="form-error">{{ $message }}</p>
                @enderror

                <div class="relative flex lg:inline-flex items-center bg-gray-200 rounded-xl mt-3">
                    <select name="category_id" id="category_id"
                        class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">

                        @foreach ($cats as $cat)
                            <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->Category_name }}</option>
                        @endforeach

                    </select>

                </div>

                <input class="form-submit" type="submit" value="Post">
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



{{--   @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->Category_name }}</option>
                    @endforeach --}}

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>

<head>
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/blogger.png" alt="Blogger" width="165" height="16">
            </a>
        </div>
        <div class="mt-8 md:mt-0 item-center flex">
            @auth

                @forelse($posts as $index => $post)
                    @if ($index === 0)
                        <a class="ml-3 text-xs font-bold uppercase text-blue-500"
                            href="/author-profile/{{ auth()->user()->id }}">{{ auth()->user()->name }} profile</a>
                    @endif
                @empty
                    <!-- Handle the case when $posts is empty -->
                @endforelse
                <a href="/" class="ml-3 text-xs font-bold uppercase text-blue-500">
                    <span class="">Home</span>
                </a>
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="ml-3 text-xs font-bold uppercase text-blue-500">
                        <span class=" ">Logout</span>
                    </button>
                </form>

                <a href="/admin/post/create" class="ml-3 text-xs font-bold uppercase text-blue-500">
                    <span class="">create new post</span>
                </a>
            @else
                <a href="/register" class="text-xs font-bold uppercase text-blue-500">
                    <span class="">Register</span>
                </a>
                <a href="/login" class="ml-3 text-xs font-bold uppercase text-blue-500">
                    <span class="">login</span>
                </a>

            @endauth


        </div>
    </nav>
    @yield('content')
    <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/feedback.webp" alt="" class="mx-auto -mb-2" style="width: 145px;">
        <h5 class="text-3xl">give us your feedback</h5>
        <p class="text-sm mt-3">Promise to consider feedback for better user experiance</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-lg w-96">
                <form method="POST" action="{{ route('feedback.store') }}">
                    @csrf
                    <div class="lg:p-3 flex items-center">
                        <label for="feedback" class="flex items-center">
                            Feedback:
                        </label>
                        <textarea name="feedback" id="feedback" rows="4" class="ml-5 resize-none border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full"></textarea>
                    </div>

                    <button type="submit" class=" mb-3 transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </footer>
</section>

@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm">

        <p>{{ session('success') }}</p>

    </div>
@endif

</body>

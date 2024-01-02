<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
       Latest<span class="text-blue-500">Blogs and News</span>
    </h1>

    <h2 class="inline-flex mt-2">By Hossam Hasanian <img src="/images/lary-head.svg" alt="Head of Lary the mascot"></h2>


    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->


        <!-- Other Filters -->
        <div class="relative flex lg:inline-flex items-center bg-gray-200 rounded-xl ">
            <select
                class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold {{-- overflow:auto max-h-10  --}}"
                onchange="(this.value != 'all') ? window.location='/categories/'+ this.value : window.location='/'">
                <option value="all" selected>all categories</option>
                @foreach ($categories as $category)
                    <option {{ isset($currentCategory) && $currentCategory->is($category) ? 'selected ' : '' }}
                        {{-- i want this to be bg-blue-500 text-white --}} value="{{ $category->slug }}"
                        class="{{ isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-500 text-white' : '' }}">
                        {{ $category->Category_name }}
                    </option>
                @endforeach

            </select>

            @include('posting._downarrow')
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-200 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                <input type="text" name="search" placeholder="Find something"
                    class="bg-transparent placeholder-black font-semibold text-sm " value="{{ request('search') }}">


            </form>
        </div>
    </div>
</header>

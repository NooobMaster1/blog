@if (isset($simpleAnchor) && $simpleAnchor)
    <div class="flex items-center text-sm ">
        <img src="/images/lary-avatar.svg" alt="Lary avatar">
        <div class="ml-3">
            <a href="/user/{{ $userId }}">{!! $userName !!}</a>
        </div>
    </div>
@else
    <div class="flex items-center text-sm">
        <img src="/images/lary-avatar.svg" alt="Lary avatar">
        <div class="ml-3">
            <a href="/user/{{ $userId }}">{!! $userName !!}</a>
        </div>
    </div>
@endif

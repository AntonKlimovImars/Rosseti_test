{{-- GRI Reference Block --}}
<div class="flex flex-wrap gap-2">
    @foreach(explode(',', $data['codes']) as $code)
        <span class="inline-flex items-center gap-1.5 bg-[#E8F4FD] text-[#00355A] text-xs font-bold px-3 py-1.5 rounded-md">
            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <path d="m9 12 2 2 4-4"/>
            </svg>
            {{ trim($code) }}
        </span>
    @endforeach
</div>

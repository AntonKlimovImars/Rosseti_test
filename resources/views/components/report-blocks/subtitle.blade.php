{{-- Subtitle Block --}}
@php
    $style = $data['style'] ?? 'default';
@endphp

@if($style === 'default')
    <p class="text-lg text-[#6B7785] mb-2">{{ $data['text'] }}</p>

@elseif($style === 'accent')
    <div class="flex items-center gap-3 mb-2">
        <div class="w-8 h-[3px] bg-[#005B9C] rounded-full"></div>
        <p class="text-lg font-bold text-[#005B9C]">{{ $data['text'] }}</p>
    </div>

@elseif($style === 'uppercase')
    <p class="text-sm uppercase tracking-[0.2em] text-[#6B7785] font-bold mb-4">{{ $data['text'] }}</p>
@endif

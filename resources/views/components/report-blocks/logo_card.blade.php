{{-- Logo Card Block --}}
@php
    $colorHex = match($data['color'] ?? 'primary') {
        'accent' => '#2196F3',
        default => '#00355A',
    };

    $styleClass = function($style) use ($colorHex) {
        return match($style) {
            'large_bold' => 'text-xl font-bold text-[#1A1A1A]',
            'normal' => 'text-base text-[#333]',
            'small' => 'text-sm text-[#333]',
            'accent' => 'text-lg font-bold',
            'muted' => 'text-sm text-[#6B7785]',
            default => 'text-base text-[#333]',
        };
    };

    $isAccent1 = ($data['text_1_style'] ?? '') === 'accent';
    $isAccent2 = ($data['text_2_style'] ?? '') === 'accent';
@endphp

<div class="bg-[#F7F9FC] rounded-2xl border border-[#E1E7F0]/60 p-6 flex flex-col items-start">
    @if(!empty($data['logo']))
        <img src="{{ Storage::url($data['logo']) }}" alt="" class="h-12 object-contain mb-4">
    @endif

    <hr class="w-full border-t border-[#E1E7F0] my-3">

    @if(!empty($data['text_1']))
        <p class="{{ $styleClass($data['text_1_style'] ?? 'large_bold') }}"
           @if($isAccent1) style="color: {{ $colorHex }}" @endif
        >{{ $data['text_1'] }}</p>
    @endif

    @if(!empty($data['text_2']))
        <p class="{{ $styleClass($data['text_2_style'] ?? 'muted') }} mt-1"
           @if($isAccent2) style="color: {{ $colorHex }}" @endif
        >{{ $data['text_2'] }}</p>
    @endif
</div>

{{-- Logo Cards Row Block --}}
@php
    $colorHex = match($data['color'] ?? 'primary') {
        'accent' => '#2196F3',
        default => '#00355A',
    };
    $cols = match($data['columns'] ?? '3') {
        '2' => 'grid-cols-2 sm:grid-cols-1',
        '4' => 'grid-cols-4 lg:grid-cols-3 sm:grid-cols-2',
        '5' => 'grid-cols-5 lg:grid-cols-3 sm:grid-cols-2',
        default => 'grid-cols-3 sm:grid-cols-2',
    };

    $styleClass = function($style) {
        return match($style) {
            'large_bold' => 'text-base font-bold text-[#1A1A1A]',
            'normal' => 'text-sm text-[#333]',
            'small' => 'text-xs text-[#333]',
            'accent' => 'text-sm font-bold',
            'muted' => 'text-xs text-[#6B7785]',
            default => 'text-sm text-[#333]',
        };
    };
@endphp

<div class="grid {{ $cols }} gap-4">
    @foreach($data['cards'] ?? [] as $card)
        @php
            $isAccent1 = ($card['text_1_style'] ?? '') === 'accent';
            $isAccent2 = ($card['text_2_style'] ?? '') === 'accent';
        @endphp
        <div class="bg-[#F7F9FC] rounded-xl border border-[#E1E7F0]/60 p-4">
            @if(!empty($card['logo']))
                <img src="{{ Storage::url($card['logo']) }}" alt="" class="h-8 object-contain mb-3">
            @endif

            <hr class="border-t border-[#E1E7F0] mb-2">

            @if(!empty($card['text_1']))
                <p class="{{ $styleClass($card['text_1_style'] ?? 'large_bold') }}"
                   @if($isAccent1) style="color: {{ $colorHex }}" @endif
                >{{ $card['text_1'] }}</p>
            @endif

            @if(!empty($card['text_2']))
                <p class="{{ $styleClass($card['text_2_style'] ?? 'muted') }} mt-0.5"
                   @if($isAccent2) style="color: {{ $colorHex }}" @endif
                >{{ $card['text_2'] }}</p>
            @endif
        </div>
    @endforeach
</div>

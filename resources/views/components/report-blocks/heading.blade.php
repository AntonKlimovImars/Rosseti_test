{{-- Heading Block --}}
@php
    $level = $data['level'] ?? 'h2';
    $classes = match($level) {
        'h2' => 'text-3xl font-bold text-[#1A1A1A] mb-6',
        'h3' => 'text-2xl font-bold text-[#1A1A1A] mb-4',
        'h4' => 'text-xl font-semibold text-[#1A1A1A] mb-3',
        default => 'text-3xl font-bold text-[#1A1A1A] mb-6',
    };
@endphp
<{{ $level }} class="{{ $classes }}">{{ $data['content'] }}</{{ $level }}>

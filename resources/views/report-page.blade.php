<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page->number }}. {{ $page->title }} — Россети</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="/fonts/fonts.css" rel="stylesheet">
    <style>[x-cloak] { display: none !important; }</style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased flex flex-col min-h-screen">
<x-header/>

{{-- Hero banner --}}
<section class="relative h-[320px] overflow-hidden bg-gradient-to-br from-[#005B9C] to-[#0082C8]">
    @if($page->hero_image)
        <img
            src="{{ Storage::url($page->hero_image) }}"
            alt="{{ $page->title }}"
            class="absolute inset-0 w-full h-full object-cover opacity-60"
        >
    @else
        {{-- Fallback: use the content image for this section --}}
        @php
            $heroSrc = file_exists(public_path('images/content-' . $page->number . '.jpg'))
                ? '/images/content-' . $page->number . '.jpg'
                : (file_exists(public_path('images/content-' . $page->number . '.png'))
                    ? '/images/content-' . $page->number . '.png'
                    : null);
        @endphp
        @if($heroSrc)
            <img
                src="{{ $heroSrc }}"
                alt="{{ $page->title }}"
                class="absolute inset-0 w-full h-full object-cover opacity-40"
            >
        @endif
    @endif
    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
    <div class="container relative z-10 flex flex-col justify-end h-full pb-10">
        <span class="text-white/50 text-7xl font-bold leading-none mb-2">{{ $page->number }}</span>
        <h1 class="text-white text-4xl font-bold">{{ $page->title }}</h1>
    </div>
</section>

{{-- Main content area with sidebar --}}
<main
    class="flex-1"
    x-data="{
        activeSection: '{{ $page->subsections->first()?->slug ?? '' }}',
        init() {
            const observer = new IntersectionObserver(
                (entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            this.activeSection = entry.target.id;
                        }
                    });
                },
                { rootMargin: '-30% 0px -60% 0px', threshold: 0 }
            );
            document.querySelectorAll('[data-subsection]').forEach(el => observer.observe(el));
        }
    }"
>
    <div class="container py-12">
        <div class="flex gap-12 lg:gap-8">
            {{-- Sticky sidebar navigation --}}
            <aside class="shrink-0 w-[220px] xl:w-[180px] lg:hidden">
                <div class="sticky top-[120px]">
                    <h3 class="text-sm font-bold text-[#6B7785] uppercase tracking-wider mb-4">Навигация</h3>
                    <nav class="flex flex-col gap-1">
                        @foreach($page->subsections as $subsection)
                            <a
                                href="#{{ $subsection->slug }}"
                                class="text-sm py-1.5 pl-3 border-l-2 transition-all duration-200"
                                :class="activeSection === '{{ $subsection->slug }}'
                                    ? 'border-[#005B9C] text-[#005B9C] font-bold'
                                    : 'border-transparent text-[#6B7785] hover:text-[#005B9C] hover:border-[#B0C4DE]'"
                                @click.prevent="
                                    document.getElementById('{{ $subsection->slug }}')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
                                "
                            >
                                {{ $subsection->title }}
                            </a>
                        @endforeach
                    </nav>
                </div>
            </aside>

            {{-- Content --}}
            <div class="flex-1 min-w-0">
                @foreach($page->subsections as $subsection)
                    <section
                        id="{{ $subsection->slug }}"
                        data-subsection
                        class="mb-16 scroll-mt-[140px]"
                        x-data="revealOnScroll()"
                    >
                        @if($subsection->content_blocks)
                            @foreach($subsection->content_blocks as $block)
                                <div
                                    class="mb-8 transition-all duration-700"
                                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                                >
                                    @include('components.report-blocks.' . $block['type'], ['data' => $block['data']])
                                </div>
                            @endforeach
                        @else
                            <div class="text-[#6B7785] italic">Контент этого подраздела ещё не заполнен.</div>
                        @endif
                    </section>
                @endforeach
            </div>
        </div>
    </div>
</main>

<x-footer/>
@stack('page-js')
</body>
</html>

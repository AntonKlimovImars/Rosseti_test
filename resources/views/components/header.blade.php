<header
    class="fixed z-50 w-full top-0"
    x-data="{
        openMenu: null,
        toggle(idx) {
            if (this.openMenu === idx) {
                this.openMenu = null;
            } else {
                this.openMenu = idx;
            }
        },
        close() {
            this.openMenu = null;
        }
    }"
    @keydown.escape.window="close()"
>
    {{-- Header bar --}}
    <div class="bg-white border-b border-[#E1E7F0]">
        <div class="flex container items-center justify-between py-3">
            {{-- Logo --}}
            <a href="/" class="shrink-0">
                <x-logo class="w-[100px]"/>
            </a>

            {{-- Navigation --}}
            <nav class="flex items-center gap-1 xl:hidden">
                @foreach($navLinks as $index => $link)
                    <button
                        class="relative px-2 py-2 text-sm text-black-400 hover:text-blue-500 transition-colors whitespace-nowrap flex items-center gap-1"
                        :class="openMenu === {{ $index }} ? 'text-blue-500 font-bold' : ''"
                        @click="toggle({{ $index }})"
                    >
                        {{ $link['title'] }}
                        <svg
                            class="w-3 h-3 transition-transform duration-200"
                            :class="openMenu === {{ $index }} ? 'rotate-180' : ''"
                            fill="none" viewBox="0 0 12 12"
                        >
                            <path d="M3 4.5L6 7.5L9 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                @endforeach
            </nav>

            {{-- Right controls --}}
            <div class="flex items-center gap-3 shrink-0">
                {{-- Language toggle --}}
                <div x-data="{ lang: 'ru' }" class="flex items-center gap-0.5 p-1 bg-[#F1F5FC] rounded-xl">
                    <button
                        @click="lang = 'ru'"
                        :class="lang === 'ru' ? 'bg-white text-blue-500 shadow-sm' : 'text-black-400'"
                        class="px-2.5 py-1 rounded-lg text-sm font-bold transition-all"
                    >RU</button>
                    <button
                        @click="lang = 'en'"
                        :class="lang === 'en' ? 'bg-white text-blue-500 shadow-sm' : 'text-black-400'"
                        class="px-2.5 py-1 rounded-lg text-sm font-bold transition-all"
                    >EN</button>
                </div>

                {{-- Download button --}}
                <a href="#" class="flex items-center justify-center w-10 h-10 bg-[#F1F5FC] rounded-xl hover:bg-[#E1E7F0] transition-colors">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M12 16V4" stroke="#005B9C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 13L12 16L15 13" stroke="#005B9C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20 16V18C20 18.5304 19.7893 19.0391 19.4142 19.4142C19.0391 19.7893 18.5304 20 18 20H6C5.46957 20 4.96086 19.7893 4.58579 19.4142C4.21071 19.0391 4 18.5304 4 18V16" stroke="#005B9C" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    {{-- Dropdown panels --}}
    <div
        x-show="openMenu !== null"
        x-cloak
        class="bg-white border-b border-[#E1E7F0] shadow-lg overflow-hidden"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
    >
        @foreach($navLinks as $index => $link)
            <div
                x-show="openMenu === {{ $index }}"
                class="container py-6"
            >
                <div class="flex gap-8">
                    {{-- Left: section title + links --}}
                    <div class="flex-1">
                        {{-- Section title --}}
                        <h3 class="text-blue-500 font-bold text-lg uppercase tracking-wide mb-5">
                            {{ $link['num'] }}. {{ $link['title'] }}
                        </h3>

                        {{-- Subsection links in 2 columns --}}
                        <div class="grid grid-cols-2 gap-x-10 gap-y-3">
                            @foreach($link['children'] as $child)
                                <a
                                    href="#"
                                    class="text-sm text-black-500 hover:text-blue-500 transition-colors leading-snug"
                                >
                                    {{ $child }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- Right: preview card with image --}}
                    <div class="shrink-0 w-[200px] h-[140px] rounded-2xl overflow-hidden relative">
                        <img
                            src="{{ file_exists(public_path('images/content-' . $link['num'] . '.jpg')) ? '/images/content-' . $link['num'] . '.jpg' : '/images/content-' . $link['num'] . '.png' }}"
                            alt="{{ $link['title'] }}"
                            class="w-full h-full object-cover"
                            onerror="this.style.display='none';this.parentElement.classList.add('bg-[#F1F5FC]')"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-500/60 to-transparent"></div>
                        <span class="absolute bottom-3 right-4 text-white text-5xl font-bold opacity-80">
                            {{ $link['num'] }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Backdrop overlay --}}
    <div
        x-show="openMenu !== null"
        x-transition.opacity.duration.200ms
        x-cloak
        class="fixed inset-0 bg-black/20 -z-10"
        @click="close()"
    ></div>
</header>

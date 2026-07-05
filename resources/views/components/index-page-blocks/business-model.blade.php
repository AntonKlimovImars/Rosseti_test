<section id="business-model" class="container py-20 md:py-12">
    <h2 x-data="revealOnScroll()" class="text-[42px] font-bold text-[#00355A] uppercase leading-tight mb-4">Бизнес-модель</h2>
    <p x-data="revealOnScroll()" class="text-[15px] text-black-500 max-w-4xl mb-12 leading-relaxed">
        Оказание услуг по передаче электроэнергии, технологическому присоединению потребителей,
        строительство и реконструкция электросетевых объектов — основные виды экономической деятельности Компании.
    </p>

    <div x-data="revealOnScroll()" class="grid grid-cols-2 gap-8 lg:grid-cols-1">

        {{-- LEFT SLIDER: Капиталы (ресурсы) --}}
        <div x-data="{ current: 0, total: 4 }">
            <h3 class="text-xl font-bold text-[#00355A] mb-2 underline underline-offset-4 decoration-[#2196F3]">Капиталы (ресурсы)</h3>
            <p class="text-sm text-black-400 mb-6 leading-relaxed">
                Ресурсы, используемые в цепочке создания стоимости, сгруппированы в шесть капиталов:
                человеческий, производственный, финансовый, интеллектуальный, социально-репутационный и природный.
            </p>

            <div class="relative overflow-hidden rounded-2xl bg-[#F7F9FC] min-h-[300px]">
                {{-- Slides --}}
                @php
                    $leftSlides = [
                        [
                            'label' => 'Производственный (активы)',
                            'sublabel' => 'Развитие и реновация инфраструктуры',
                            'hasImage' => true,
                            'stats' => [
                                ['value' => '2,6', 'unit' => 'млн км', 'desc' => 'протяженность ЛЭП'],
                                ['value' => '612', 'unit' => 'тыс. шт.', 'desc' => 'количество подстанций'],
                            ],
                        ],
                        [
                            'label' => 'Финансовый',
                            'sublabel' => 'Устойчивая финансовая база',
                            'hasImage' => false,
                            'stats' => [
                                ['value' => '725', 'unit' => 'млрд руб.', 'desc' => 'инвестиции в инфраструктуру'],
                                ['value' => '270', 'unit' => 'млрд руб.', 'desc' => 'налоговые отчисления'],
                            ],
                        ],
                        [
                            'label' => 'Человеческий',
                            'sublabel' => 'Квалифицированные специалисты',
                            'hasImage' => false,
                            'stats' => [
                                ['value' => '>235', 'unit' => 'тыс. чел.', 'desc' => 'численность персонала'],
                                ['value' => '10,8', 'unit' => 'млрд руб.', 'desc' => 'расходы на охрану труда'],
                            ],
                        ],
                        [
                            'label' => 'Природный',
                            'sublabel' => 'Бережное отношение к ресурсам',
                            'hasImage' => false,
                            'stats' => [
                                ['value' => '1,2', 'unit' => 'млрд руб.', 'desc' => 'расходы на экологию'],
                                ['value' => '153', 'unit' => 'тыс. шт.', 'desc' => 'птицезащитные устройства'],
                            ],
                        ],
                    ];
                @endphp

                @foreach($leftSlides as $i => $slide)
                    <div
                        x-show="current === {{ $i }}"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-x-4"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        class="p-0"
                    >
                        @if($slide['hasImage'])
                            <div class="relative h-[160px] overflow-hidden rounded-t-2xl">
                                <img src="/images/hills-power.jpg" alt="" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-[#00355A]/80 to-transparent"></div>
                                <div class="absolute bottom-4 left-6">
                                    <p class="text-white/80 text-xs">{{ $slide['label'] }}</p>
                                    <p class="text-white font-bold">{{ $slide['sublabel'] }}</p>
                                </div>
                            </div>
                        @else
                            <div class="px-6 pt-6 pb-2">
                                <p class="text-[#6B7785] text-xs">{{ $slide['label'] }}</p>
                                <p class="text-[#00355A] font-bold text-lg">{{ $slide['sublabel'] }}</p>
                            </div>
                        @endif

                        <div class="grid grid-cols-2 gap-4 p-6">
                            @foreach($slide['stats'] as $stat)
                                <div>
                                    <div class="flex items-baseline gap-1.5">
                                        <span class="text-4xl font-bold text-[#00355A]">{{ $stat['value'] }}</span>
                                        <span class="text-sm text-[#6B7785]">{{ $stat['unit'] }}</span>
                                    </div>
                                    <p class="text-xs text-[#6B7785] mt-1">{{ $stat['desc'] }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Navigation arrows --}}
            <div class="flex gap-3 mt-4">
                <button
                    @click="current = current > 0 ? current - 1 : total - 1"
                    class="w-10 h-10 rounded-full border border-[#E1E7F0] flex items-center justify-center hover:bg-[#F7F9FC] transition-colors"
                >
                    <svg class="w-4 h-4 text-[#00355A]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                    </svg>
                </button>
                <button
                    @click="current = current < total - 1 ? current + 1 : 0"
                    class="w-10 h-10 rounded-full border border-[#E1E7F0] flex items-center justify-center hover:bg-[#F7F9FC] transition-colors"
                >
                    <svg class="w-4 h-4 text-[#00355A]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                    </svg>
                </button>
                <span class="ml-auto text-xs text-[#6B7785] self-center" x-text="(current + 1) + ' / ' + total"></span>
            </div>
        </div>

        {{-- RIGHT SLIDER: Результаты для заинтересованных сторон --}}
        <div x-data="{ current: 0, total: 3 }">
            <h3 class="text-xl font-bold text-[#00355A] mb-2 underline underline-offset-4 decoration-[#2196F3]">Результаты для заинтересованных сторон</h3>
            <p class="text-sm text-black-400 mb-6 leading-relaxed">
                Ресурсы, используемые в цепочке создания стоимости, сгруппированы в шесть капиталов:
                человеческий, производственный, финансовый, интеллектуальный, социально-репутационный и природный.
            </p>

            <div class="relative overflow-hidden rounded-2xl bg-[#F7F9FC] min-h-[300px]">
                @php
                    $rightSlides = [
                        [
                            'label' => 'Потребители',
                            'stats' => [
                                ['value' => '837', 'unit' => 'млрд кВт·ч', 'desc' => 'объем переданной электроэнергии', 'change' => '-3,1%'],
                                ['value' => '14,7', 'unit' => 'ГВт', 'desc' => 'объем присоединенной мощности', 'change' => '-1,5%'],
                                ['value' => '2,4', 'unit' => 'SAIDI', 'desc' => '', 'change' => '-11%'],
                                ['value' => '35', 'unit' => 'тыс. км', 'desc' => 'увеличение протяженности ЛЭП', 'change' => '+7,2%'],
                                ['value' => '15', 'unit' => 'тыс. МВА', 'desc' => '', 'change' => ''],
                                ['value' => '2 880', 'unit' => 'МВт·ч Пенс', 'desc' => 'ввод новых мощностей подстанций', 'change' => ''],
                            ],
                        ],
                        [
                            'label' => 'Акционеры и инвесторы',
                            'stats' => [
                                ['value' => '1 697', 'unit' => 'млрд руб.', 'desc' => 'выручка', 'change' => '+8,3%'],
                                ['value' => '167', 'unit' => 'млрд руб.', 'desc' => 'чистая прибыль', 'change' => '+12%'],
                                ['value' => '28,1', 'unit' => '%', 'desc' => 'рентабельность EBITDA', 'change' => ''],
                            ],
                        ],
                        [
                            'label' => 'Сотрудники и общество',
                            'stats' => [
                                ['value' => '340', 'unit' => 'тыс.', 'desc' => 'новых потребителей присоединено', 'change' => ''],
                                ['value' => '100+', 'unit' => '', 'desc' => 'мероприятий к 80-летию Победы', 'change' => ''],
                                ['value' => '82', 'unit' => 'региона', 'desc' => 'география присутствия', 'change' => ''],
                            ],
                        ],
                    ];
                @endphp

                @foreach($rightSlides as $i => $slide)
                    <div
                        x-show="current === {{ $i }}"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-x-4"
                        x-transition:enter-end="opacity-100 translate-x-0"
                        class="p-6"
                    >
                        <p class="text-[#00355A] font-bold text-lg mb-4">{{ $slide['label'] }}</p>
                        <div class="grid grid-cols-3 gap-4 sm:grid-cols-2">
                            @foreach($slide['stats'] as $stat)
                                <div class="bg-white rounded-xl p-4 border border-[#E1E7F0]/60">
                                    @if(!empty($stat['change']))
                                        <span class="text-[10px] font-bold px-2 py-0.5 rounded-full
                                            {{ str_starts_with($stat['change'], '+') ? 'bg-green-50 text-green-600' : (str_starts_with($stat['change'], '-') ? 'bg-red-50 text-red-500' : 'bg-gray-50 text-gray-500') }}">
                                            {{ $stat['change'] }}
                                        </span>
                                    @endif
                                    <div class="flex items-baseline gap-1 mt-1.5">
                                        <span class="text-2xl font-bold text-[#2196F3]">{{ $stat['value'] }}</span>
                                        @if(!empty($stat['unit']))
                                            <span class="text-xs text-[#6B7785]">{{ $stat['unit'] }}</span>
                                        @endif
                                    </div>
                                    @if(!empty($stat['desc']))
                                        <p class="text-[11px] text-[#6B7785] mt-1 leading-tight">{{ $stat['desc'] }}</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Navigation arrows --}}
            <div class="flex gap-3 mt-4">
                <button
                    @click="current = current > 0 ? current - 1 : total - 1"
                    class="w-10 h-10 rounded-full border border-[#E1E7F0] flex items-center justify-center hover:bg-[#F7F9FC] transition-colors"
                >
                    <svg class="w-4 h-4 text-[#00355A]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5"/>
                    </svg>
                </button>
                <button
                    @click="current = current < total - 1 ? current + 1 : 0"
                    class="w-10 h-10 rounded-full border border-[#E1E7F0] flex items-center justify-center hover:bg-[#F7F9FC] transition-colors"
                >
                    <svg class="w-4 h-4 text-[#00355A]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5"/>
                    </svg>
                </button>
                <span class="ml-auto text-xs text-[#6B7785] self-center" x-text="(current + 1) + ' / ' + total"></span>
            </div>
        </div>

    </div>
</section>

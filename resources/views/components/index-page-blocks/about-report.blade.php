<section id="about-report" class="relative overflow-hidden py-20 md:py-14">
    {{-- Background image --}}
    <div class="absolute inset-0">
        <img src="/images/hills-power.jpg" alt="" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-[#1B4B7A]/60 backdrop-blur-[2px]"></div>
    </div>

    <div class="container relative z-10">
        {{-- Top row: heading + principles card --}}
        <div x-data="revealOnScroll()" class="flex gap-10 mb-14 lg:flex-col">
            {{-- Left: heading --}}
            <div class="flex-1">
                <h2 class="text-[52px] font-bold text-white uppercase leading-tight mb-6 xl:text-[38px]">Об отчете</h2>
                <p class="text-lg text-white/90 max-w-[480px] leading-relaxed">
                    Наша цель: Максимально полно представлять информацию о деятельности Компании для широкого круга заинтересованных сторон.
                </p>
            </div>

            {{-- Right: principles card --}}
            <div class="shrink-0 w-[480px] xl:w-[400px] lg:w-full bg-white/15 backdrop-blur-lg rounded-2xl border border-white/20 p-8">
                <h3 class="text-white font-bold text-lg mb-6">Принципы подготовки нефинансовой отчетности ПАО «Россети»</h3>
                <div class="grid grid-cols-3 gap-y-6 gap-x-4 sm:grid-cols-2">
                    @foreach(['Существенность', 'Сравнимость', 'Прозрачность', 'Учет мнений заинтересованных сторон', 'Актуальность', 'Достоверность'] as $principle)
                        <div class="flex flex-col items-center text-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
                                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/>
                                </svg>
                            </div>
                            <span class="text-white text-sm">{{ $principle }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Bottom row: standards --}}
        <div x-data="revealOnScroll()">
            <h3 class="text-white text-xl mb-6">Стандарты и рекомендации, на которые мы опирались при подготовке Отчета</h3>
            <div class="grid grid-cols-2 gap-6 lg:grid-cols-1">
                {{-- Russian standards --}}
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 p-8">
                    <h4 class="text-white font-bold mb-4 text-[#7BC0F7]">Российские</h4>
                    <ul class="space-y-3 text-white/90 text-sm leading-relaxed">
                        <li class="flex gap-2">
                            <span class="shrink-0 mt-1.5 w-1.5 h-1.5 rounded-full bg-white/60"></span>
                            <span>Рекомендации Банка России по раскрытию публичными акционерными обществами нефинансовой информации, связанной с деятельностью таких обществ</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="shrink-0 mt-1.5 w-1.5 h-1.5 rounded-full bg-white/60"></span>
                            <span>Рекомендации ПАО Московская Биржа об утверждении Дополнительных правил, требований и рекомендаций по раскрытию информации эмитентами, акции которых включены в Первый или Второй уровень</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="shrink-0 mt-1.5 w-1.5 h-1.5 rounded-full bg-white/60"></span>
                            <span>Методологии российских рейтинговых агентств по присвоению ESG-рейтингов нефинансовым компаниям</span>
                        </li>
                    </ul>
                </div>

                {{-- International standards --}}
                <div class="bg-white/10 backdrop-blur-lg rounded-2xl border border-white/20 p-8">
                    <h4 class="text-white font-bold mb-4 text-[#7BC0F7]">Международные</h4>
                    <ul class="space-y-3 text-white/90 text-sm leading-relaxed">
                        <li class="flex gap-2">
                            <span class="shrink-0 mt-1.5 w-1.5 h-1.5 rounded-full bg-white/60"></span>
                            <span>Стандарты Глобальной инициативы по отчетности в области устойчивого развития 2021 (Global Reporting Initiative (GRI) Standards, GRI)</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="shrink-0 mt-1.5 w-1.5 h-1.5 rounded-full bg-white/60"></span>
                            <span>Стандарт по взаимодействию со стейкхолдерами AA1000SES</span>
                        </li>
                        <li class="flex gap-2">
                            <span class="shrink-0 mt-1.5 w-1.5 h-1.5 rounded-full bg-white/60"></span>
                            <span>Отраслевое приложение GRI для электроэнергетической отрасли, The Electric Utilities Sector Disclosures</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

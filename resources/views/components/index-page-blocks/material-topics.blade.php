<section id="impact" class="container py-24 md:py-16">
    <div x-data="revealOnScroll()" class="will-change-transform mb-12 flex items-end justify-between gap-8 md:block">
        <div>
            <p class="mb-4 text-sm uppercase tracking-[0.2em] text-[#009FE3]">GRI 3-1, 3-2</p>
            <h2 class="text-[52px] font-semibold leading-none md:text-[36px]">
                Существенные темы отчета
            </h2>
        </div>
        <p class="max-w-[420px] text-lg text-black-400 md:mt-5">
            Приоритетные темы показывают, какие направления важны для внутренних и внешних стейкхолдеров.
        </p>
    </div>
    <div class="grid grid-cols-3 gap-5 lg:grid-cols-2 sm:grid-cols-1">
        @php
            $topics = [
                ['num' => '01', 'title' => 'Надежное электроснабжение', 'type' => 'Управленческий аспект'],
                ['num' => '02', 'title' => 'Здоровье и безопасность', 'type' => 'Социальный аспект'],
                ['num' => '03', 'title' => 'Развитие регионов', 'type' => 'Социальный аспект'],
                ['num' => '04', 'title' => 'Забота о потребителях', 'type' => 'Социальный аспект'],
                ['num' => '05', 'title' => 'Кадровый потенциал', 'type' => 'Социальный аспект'],
                ['num' => '06', 'title' => 'Цифровые технологии', 'type' => 'Управленческий аспект'],
            ];
        @endphp
        @foreach($topics as $topic)
            <article x-data="revealOnScroll()" class="will-change-transform group rounded-[28px] bg-white p-6 shadow-sm transition duration-500 hover:-translate-y-2">
                <div class="mb-8 flex h-12 w-12 items-center justify-center rounded-full bg-[#E4F5FE] text-[#009FE3] font-semibold">
                    {{ $topic['num'] }}
                </div>
                <h3 class="text-xl font-semibold text-blue-500">{{ $topic['title'] }}</h3>
                <p class="mt-4 text-sm text-black-400">{{ $topic['type'] }}</p>
            </article>
        @endforeach
    </div>
</section>

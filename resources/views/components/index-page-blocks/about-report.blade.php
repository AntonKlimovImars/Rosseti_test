<section id="sustainability" class="relative overflow-hidden bg-[#0066B3] py-24 text-white md:py-16">
    <div class="absolute -top-24 right-0 h-[420px] w-[420px] rounded-full bg-[#009FE3]/30 blur-[120px]"></div>
    <div class="container relative z-10">
        <p class="mb-5 text-sm uppercase tracking-[0.2em] text-white/60">Об отчете</p>
        <h2 class="max-w-[860px] text-[54px] font-semibold leading-tight text-white md:text-[36px]">
            Максимально полно представляем информацию о деятельности компании
        </h2>
        <div class="mt-12 grid grid-cols-3 gap-5 lg:grid-cols-2 sm:grid-cols-1">
            @foreach(['Учет мнений заинтересованных сторон', 'Сравнимость', 'Актуальность', 'Существенность', 'Прозрачность', 'Достоверность'] as $principle)
                <div class="rounded-[28px] border border-white/20 bg-white/10 p-6 backdrop-blur">
                    <p class="text-xl font-medium text-white">{{ $principle }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

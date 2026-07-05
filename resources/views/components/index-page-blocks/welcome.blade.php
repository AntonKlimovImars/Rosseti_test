<section
    id="welcome"
    class="h-screen w-full relative overflow-hidden rounded-b-[34px]"
    x-data="{
        mouseX: 0,
        mouseY: 0,
        handleMouseMove(e) {
            const rect = $el.getBoundingClientRect();
            this.mouseX = (e.clientX - rect.left - rect.width / 2) / rect.width;
            this.mouseY = (e.clientY - rect.top - rect.height / 2) / rect.height;
        }
    }"
    @mousemove="handleMouseMove($event)"
    @mouseleave="mouseX = 0; mouseY = 0"
>
    {{-- Layer 1: Sky + distant landscape (fills entire background) --}}
    <img
        src="/fixed/welcome-1.png"
        alt=""
        class="absolute inset-0 w-full h-full object-cover transition-transform duration-300 ease-out will-change-transform"
        :style="`transform: scale(1.15) translate(${mouseX * 10}px, ${mouseY * 10}px)`"
    >

    {{-- Layer 2: Middle hills (anchored to bottom, natural width) --}}
    <img
        src="/fixed/welcome-2.png"
        alt=""
        class="absolute bottom-0 left-1/2 w-[115%] transition-transform duration-300 ease-out will-change-transform"
        :style="`transform: translateX(-50%) translate(${mouseX * 25}px, ${mouseY * 15}px) scale(1.05)`"
    >

    {{-- Layer 3: Foreground grass/hills (anchored to bottom, natural width) --}}
    <img
        src="/fixed/welcome-3.png"
        alt=""
        class="absolute bottom-0 left-1/2 w-[115%] transition-transform duration-300 ease-out will-change-transform"
        :style="`transform: translateX(-50%) translate(${mouseX * 40}px, ${mouseY * 20}px) scale(1.05)`"
    >

    <div class="flex flex-col items-center justify-center h-full text-center relative z-20 ">
        <x-logo color="white" class="w-[186px] mb-12" />
        <h1 class="mb-4 uppercase text-white">Создаем потенциал<br>развития страны</h1>
        <h3 class="text-2xl font-normal text-white">Отчет о социальной ответственности <br>и корпоративном устойчивом развитии </h3>
    </div>

    <h3 class="absolute left-1/2 bottom-[104px] -translate-x-1/2 text-2xl text-white">2025</h3>

</section>

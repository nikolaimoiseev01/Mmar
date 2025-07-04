<!-- Подключи Alpine.js, если ещё не -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<section class="block-carousel py-20 bg-white">
    <div class="container mx-auto relative w-full max-w-7xl h-[400px] perspective-[1500px] overflow-hidden">
        <div
            x-data="carousel3DSmooth()"
            x-init="startRotation()"
            class="w-full h-full relative transform-style-preserve-3d will-change-transform"
            :style="`transform: translateZ(-${radius}px) rotateY(${rotationY}deg)`"
        >
            <template x-for="(slide, index) in slides" :key="index">
                <figure
                    class="absolute w-64 h-64 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 rounded-2xl overflow-hidden shadow-xl flex flex-col items-center justify-center bg-gray-100 text-white"
                    :style="`transform: rotateY(${index * angle}deg) translateZ(${radius}px);`"
                >
                    <!-- VIDEO -->
                    <template x-if="slide.type === 'video'">
                        <video :src="slide.src" autoplay loop muted playsinline class="w-full h-full object-cover"></video>
                    </template>

                    <!-- IMAGE -->
                    <template x-if="slide.type === 'image'">
                        <img :src="slide.src" alt="" class="w-full h-full object-cover" />
                    </template>

                    <!-- TEXT CARD -->
                    <template x-if="slide.type === 'text'">
                        <div class="flex flex-col items-center justify-center w-full h-full bg-yellow-400">
                            <div class="text-4xl font-bold" x-text="slide.title"></div>
                            <div class="text-xl mt-2" x-text="slide.subtitle"></div>
                        </div>
                    </template>
                </figure>
            </template>
        </div>
    </div>
</section>

<script>
    function carousel3DSmooth() {
        return {
            slides: [
                { type: 'video', src: 'https://cdn.sanity.io/files/ds6qxd1h/production/5dfadc398263aaa81d0967c8019ccd28e190fdde.mp4' },
                { type: 'text', title: '30+', subtitle: 'products' },
                { type: 'image', src: 'https://cdn.sanity.io/images/ds6qxd1h/production/3e54142be488064e045794f167afbfa831c20264-664x664.jpg?w=664&h=664&auto=format' },
                { type: 'video', src: 'https://cdn.sanity.io/files/ds6qxd1h/production/7da9878c5cda30efea67438c2db2a81b82fc0920.mp4' },
                { type: 'text', title: '2014', subtitle: 'established' },
            ],
            radius: 822, // как у YOLO
            rotationY: 0,
            speed: 0.1, // скорость вращения (чем меньше, тем медленнее)
            get angle() {
                return 360 / this.slides.length;
            },
            startRotation() {
                const rotate = () => {
                    this.rotationY -= this.speed;
                    requestAnimationFrame(rotate);
                };
                rotate();
            },
        }
    }
</script>

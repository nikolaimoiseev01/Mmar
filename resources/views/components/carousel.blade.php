@props([
    'cards' => [
        [
            'img' => '/fixed/responsibility.jpg',
            'title' => 'Responsibility',
            'description' => "Committing to ethical practices, transparency, and quality as the cornerstones of a sustainable future."
        ],
        [
            'img' => '/fixed/fassion.jpg',
            'title' => 'Fashion as Art',
            'description' => "Celebrating the creative process in every garment, honouring the designers' vision, and emphasising the importance of details that elevate ideas into wearable works of art."
        ],
        [
            'img' => '/fixed/care.jpg',
            'title' => 'Care',
            'description' => "Valuing the people who create our clothes, the lands where raw materials are sourced, the stories behind each garment, and how these pieces become part of our personal histories."
        ],
        [
            'img' => '/fixed/responsibility.jpg',
            'title' => 'Responsibility',
            'description' => "Committing to ethical practices, transparency, and quality as the cornerstones of a sustainable future."
        ],
        [
            'img' => '/fixed/fassion.jpg',
            'title' => 'Fashion as Art',
            'description' => "Celebrating the creative process in every garment, honouring the designers' vision, and emphasising the importance of details that elevate ideas into wearable works of art."
        ],
    ]
])
<style>
    .carousel {
        width: 100%;
        height: clamp(500px, 100vh, 1200px);
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        perspective: 2000px;
    }

    @media (max-width: 1024px) {
        .carousel {
            perspective: 1400px;
        }
    }

    @media (max-width: 768px) {
        .carousel {
            perspective: 2500px;
            height:400px;
        }
    }

    .carousel__track {
        width: 100%;
        height: 100%;
        position: relative;
        transform-style: preserve-3d;
    }

    .carousel__slide {
        width: clamp(280px, 80%, 600px);
        aspect-ratio: 4 / 5;
        position: absolute;
        top: 50%;
        left: 50%;
        transform-style: preserve-3d;
        background-size: cover;
        background-position: center;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        transition: transform 0.6s ease, opacity 0.6s ease;
        opacity: 0;
        pointer-events: none;
    }

    .carousel__slide h3 {
        margin-bottom: 10px;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .carousel__slide p {
        font-size: 1rem;
    }
</style>

<div class="carousel">
    <div class="carousel__track" id="carouselTrack">
        @foreach($cards as $card)
            <div class="carousel__slide" data-index="{{ $loop->index }}"
                 style="background-image: url('{{ $card['img'] }}');">
                <div class="bg-gradient-to-b from-transparent to-[#000000ba] p-4">
                    <h3 class="uppercase !font-normal">{{ $card['title'] }}</h3>
                    <p>{{ $card['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    const slides = document.querySelectorAll('.carousel__slide');
    const totalSlides = slides.length;
    let baseAngle = -100;
    const step = 360 / totalSlides;


    function getRadius() {
        const width = window.innerWidth;
        if (width < 640) return 280;     // sm
        if (width < 768) return 350;     // md
        if (width < 1024) return 450;    // lg
        return 500;                      // xl and above
    }


    const radius = getRadius();

    function renderSlides() {
        slides.forEach((slide, i) => {
            const angle = baseAngle + i * step;
            const rad = angle * Math.PI / 180;
            const x = Math.sin(rad) * radius;
            const z = Math.cos(rad) * radius;

            const mirrored = angle % 360 > 90 && angle % 360 < 270;

            slide.style.transform = `
    translate(-50%, -50%)
    translateX(${x}px)
    translateZ(${z}px)
    rotateY(${angle}deg)
    ${mirrored ? 'scaleX(-1)' : ''}
`;

            // Скрывать, если карточка "далеко за спиной"
            if (z < -100) {
                slide.style.opacity = '1';
                slide.style.pointerEvents = 'none';
            } else {
                slide.style.opacity = '0';
                slide.style.pointerEvents = 'auto';
            }
        });
    }

    function animate() {
        baseAngle += 0.05;
        renderSlides();
        requestAnimationFrame(animate);
    }

    renderSlides();
    animate();
</script>

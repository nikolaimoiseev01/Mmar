import './bootstrap';
import $ from 'jquery'
import {livewire_hot_reload} from 'virtual:livewire-hot-reload'
// import Swiper and modules styles
// import Swiper JS
import Swiper from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import {Navigation, Pagination} from "swiper/modules";
// typical import
import gsap from "gsap";
// get other plugins:
import ScrollTrigger from "gsap/ScrollTrigger";

import Lenis from '@studio-freight/lenis';


document.addEventListener('alpine:init', () => {
    Alpine.store('sidebarOpened', false)
})


// don't forget to register plugins
gsap.registerPlugin(ScrollTrigger);
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

window.$ = $;
livewire_hot_reload();

// Регистрация Swiper модулей
Swiper.use([Navigation, Pagination]);
window.Swiper = Swiper;


// Установка куки
function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

// Получение куки
function getCookie(name) {
    const nameEQ = name + "=";
    const cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i];
        while (cookie.charAt(0) === ' ') cookie = cookie.substring(1, cookie.length);
        if (cookie.indexOf(nameEQ) === 0) {
            return decodeURIComponent(cookie.substring(nameEQ.length, cookie.length)); // Декодируем значение
        }
    }
    return null;
}

// Удаление куки
function deleteCookie(name) {
    document.cookie = name + "=; Max-Age=-99999999;";
}

document.addEventListener('DOMContentLoaded', function () {
    window.updateBasketCount = function () {
        let data = getCookie('basket-products');
        data = data ? JSON.parse(data) : [];
        let products_cnt = Object.keys(data).length
        if (products_cnt > 0) {
            $('#basket-badge').removeClass('hidden');
            $('#basket-badge').text(products_cnt);
        } else {
            $('#basket-badge').addClass('hidden');
        }
    }
})

// Объявляем функцию снаружи, чтобы она была доступна глобально
document.addEventListener('DOMContentLoaded', function () {
    window.updateBasketButtons = function () {
        let data = getCookie('basket-products');
        data = data ? JSON.parse(data) : [];
        $.each(data, function (index, item) {
            let button = $(`#big-basket-button-${item.id}`);
            button.text('ADDED');
            button.addClass('disabled');
            $(`#product-basket-button-${item.id}`).addClass('added');
        });
    }
})

// Добавляем обработчик на событие
document.addEventListener('afterBasketUpdate', function () {
    updateBasketButtons()
    updateBasketCount()
});


document.addEventListener('DOMContentLoaded', function () {
    window.updateWishlistCount = function () {
        let data = getCookie('wishlist-products');
        data = data ? JSON.parse(data) : [];
        let products_cnt = Object.keys(data).length
        if (products_cnt > 0) {
            $('#wishlist-badge').removeClass('hidden');
            $('#wishlist-badge').text(products_cnt);
        } else {
            $('#wishlist-badge').addClass('hidden');
        }
    }
})

document.addEventListener('DOMContentLoaded', function () {
    window.updateWishlistButtons = function () {
        let data = getCookie('wishlist-products');
        data = data ? JSON.parse(data) : [];

        // Сначала очищаем все .wishlist-button от класса 'added'
        $('.wishlist-button').removeClass('added');

        // Добавляем 'added' только тем, чьи ID есть в куке
        $.each(data, function (index, item) {
            $(`#product-wishlist-button-${item.id}`).addClass('added');
        });
    }
});

document.addEventListener('afterWishlistUpdate', function () {
    updateWishlistButtons()
    updateWishlistCount()
});

gsap.registerPlugin(ScrollTrigger)

// Инициализация Lenis
const lenis = new Lenis({
    smooth: true,
})
window.lenis = lenis;

// rAF для Lenis
function raf(time) {
    lenis.raf(time)
    requestAnimationFrame(raf)
}

requestAnimationFrame(raf)

// Связка Lenis + ScrollTrigger
ScrollTrigger.scrollerProxy(document.body, {
    scrollTop(value) {
        return arguments.length ? lenis.scrollTo(value, {immediate: true}) : window.scrollY
    },
    getBoundingClientRect() {
        return {top: 0, left: 0, width: window.innerWidth, height: window.innerHeight}
    },
    pinType: document.body.style.transform ? 'transform' : 'fixed',
})

lenis.on('scroll', ScrollTrigger.update)
ScrollTrigger.refresh()

// Анимации появления блоков

document.addEventListener('DOMContentLoaded', function () {
    window.smoothContent = function () {
        gsap.utils.toArray('.smooth-content').forEach((el) => {
            gsap.to(el, {
                opacity: 1,
                y: 0,
                duration: 1,
                ease: 'power2.out',
                scrollTrigger: {
                    trigger: el,
                    start: 'top 80%',
                    toggleActions: 'play none none reverse',
                },
            })
        })
    }
})
Livewire.hook('morph.updated', ({el, component}) => {
    updateBasketCount()
    updateBasketButtons()
    updateWishlistButtons()
    updateWishlistCount()
    smoothContent()
});

window.addEventListener('livewire:navigated', function () {
    updateBasketCount()
    updateBasketButtons()
    updateWishlistButtons()
    updateWishlistCount()
    smoothContent()
});

;
if (window.APP_ENV === 'production') {
    // document.body.style.setProperty('cursor', 'none', 'important');
    //
    // document.querySelectorAll('*').forEach(el => {
    //     el.style.setProperty('cursor', 'none', 'important');
    // });
    // const cursor = document.getElementById('cursor')
    //
    // let mouseX = 0
    // let mouseY = 0
    // let currentX = 0
    // let currentY = 0
    //
    // document.addEventListener('mousemove', (e) => {
    //     mouseX = e.clientX
    //     mouseY = e.clientY
    // })
    //
    // function animateCursor() {
    //     currentX += (mouseX - currentX) * 0.2
    //     currentY += (mouseY - currentY) * 0.2
    //
    //     cursor.style.transform = `translate(${currentX}px, ${currentY}px)`
    //     requestAnimationFrame(animateCursor)
    // }
    //
    // animateCursor()
}







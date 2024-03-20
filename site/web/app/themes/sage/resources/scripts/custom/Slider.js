import EmblaCarousel from 'embla-carousel'
import Autoplay from 'embla-carousel-autoplay'
import { addPrevNextBtnsClickHandlers } from './EmblaControls.js'

// Front page hero slider
const emblaNode = document.querySelector('.embla.hero-fp__mid__slider')
const options = { loop: true }
if (emblaNode) {
    const emblaApi = EmblaCarousel(emblaNode, options, [Autoplay()])
}

// Carousel images slider
const carouselImages = document.querySelector('.carousel.slider-images')
if (carouselImages) {
    const viewportNode = carouselImages.querySelector('.embla__viewport')
    const carouselOptions = { 
        loop: true, 
        slidesToScroll: 1, 
        slidesToShow: 3,       
    }
    const carousel = EmblaCarousel(viewportNode, carouselOptions, [Autoplay()])
}

// Carousel icons
const carouselIcons = document.querySelector('.carousel.slider-icons')
if (carouselIcons) {
    const viewportNode = carouselIcons.querySelector('.embla__viewport')
    const carouselOptions = { 
        loop: true, 
        slidesToScroll: 1, 
    }
    const carousel = EmblaCarousel(viewportNode, carouselOptions, [Autoplay()])
}

// Timeline
const timeline = document.querySelector('.embla.timeline__slider');
if (timeline) {
    const viewportNode = timeline.querySelector('.embla__viewport');
    const prevBtn = timeline.querySelector('.embla__button--prev');
    const nextBtn = timeline.querySelector('.embla__button--next');
    const slides = timeline.querySelectorAll('.embla__slide');

    const timelineOptions = {
        align: 'center',
        dragFree: true,
    }

    const emblaApi = EmblaCarousel(viewportNode, timelineOptions);

    if (slides.length > 0) {
        slides[0].classList.add('active');
    }

    const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
        emblaApi,
        prevBtn,
        nextBtn
    )

    emblaApi
        .on('destroy', removePrevNextBtnsClickHandlers)

    emblaApi.on('select', () => {
        const activeIndex = emblaApi.selectedScrollSnap();
        slides.forEach(slide => slide.classList.remove('active'));
        slides[activeIndex].classList.add('active');
    });
}
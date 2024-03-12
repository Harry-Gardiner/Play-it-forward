import EmblaCarousel from 'embla-carousel'
import Autoplay from 'embla-carousel-autoplay'

// Front page hero slider
const emblaNode = document.querySelector('.embla')
const options = { loop: true }
if (emblaNode) {
    const emblaApi = EmblaCarousel(emblaNode, options, [Autoplay()])
}

// Carousel slider
const carouselNode = document.querySelector('.carousel')
const carouselOptions = { loop: true, slidesToScroll: 1, slidesToShow: 3 }
if (carouselNode) {
    const carousel = EmblaCarousel(carouselNode, carouselOptions, [Autoplay()])
}
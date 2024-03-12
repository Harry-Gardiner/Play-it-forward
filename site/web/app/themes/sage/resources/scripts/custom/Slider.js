import EmblaCarousel from 'embla-carousel'
import Autoplay from 'embla-carousel-autoplay'

// Front page hero slider
const emblaNode = document.querySelector('.embla')
const options = { loop: true }
if (emblaNode) {
    const emblaApi = EmblaCarousel(emblaNode, options, [Autoplay()])
}

// Carousel images slider
const carouselImages = document.querySelector('.carousel.slider-images')
if (carouselImages) {
    const viewportNode = emblaNode.querySelector('.embla__viewport')
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
    const viewportNode = emblaNode.querySelector('.embla__viewport')
    const carouselOptions = { 
        loop: true, 
        slidesToScroll: 1, 
    }
    const carousel = EmblaCarousel(viewportNode, carouselOptions, [Autoplay()])
}
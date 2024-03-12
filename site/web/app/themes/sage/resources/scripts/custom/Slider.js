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
if (carouselNode) {
    const viewportNode = emblaNode.querySelector('.embla__viewport')
    const carouselOptions = { 
        loop: true, 
        slidesToScroll: 1, 
        slidesToShow: 3,
        
        breakpoints: {
            '(min-width: 768px)': {  },
          },
       
    }
    const carousel = EmblaCarousel(viewportNode, carouselOptions, [Autoplay()])
}
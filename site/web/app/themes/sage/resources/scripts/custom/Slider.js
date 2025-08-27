import EmblaCarousel from 'embla-carousel';
import Autoplay from 'embla-carousel-autoplay';
import { addPrevNextBtnsClickHandlers } from './EmblaControls.js';

// Hero Slider
const heroSlider = document.querySelector('.hero-slider.embla');
if (heroSlider) {
  const viewportNode = heroSlider.querySelector('.embla__viewport');
  const prevBtn = heroSlider.querySelector('.embla__prev');
  const nextBtn = heroSlider.querySelector('.embla__next');
  const dotNodes = heroSlider.querySelectorAll('.embla__dot');

  const heroOptions = {
    loop: true,
    duration: 30,
  };

  // Default autoplay delay, can be overridden by data attribute
  const autoplayDelay = 5000;
  const emblaApi = EmblaCarousel(viewportNode, heroOptions, [
    Autoplay({ delay: autoplayDelay }),
  ]);

  // Add navigation handlers
  if (prevBtn && nextBtn) {
    const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
      emblaApi,
      prevBtn,
      nextBtn
    );
    emblaApi.on('destroy', removePrevNextBtnsClickHandlers);
  }

  // Add custom dot navigation for existing dots
  if (dotNodes.length > 0) {
    const addCustomDotHandlers = () => {
      dotNodes.forEach((dotNode, index) => {
        dotNode.addEventListener(
          'click',
          () => emblaApi.scrollTo(index),
          false
        );
      });
    };

    const toggleDotBtnsActive = () => {
      const selected = emblaApi.selectedScrollSnap();
      dotNodes.forEach((dotNode, index) => {
        if (index === selected) {
          dotNode.classList.add('embla__dot--selected');
        } else {
          dotNode.classList.remove('embla__dot--selected');
        }
      });
    };

    emblaApi
      .on('init', addCustomDotHandlers)
      .on('init', toggleDotBtnsActive)
      .on('select', toggleDotBtnsActive);

    // Initialize first dot as active
    if (dotNodes[0]) {
      dotNodes[0].classList.add('embla__dot--selected');
    }
  }
}

// Front page hero slider
const emblaNode = document.querySelector('.embla.hero-fp__mid__slider');
const options = { loop: true };
if (emblaNode) {
  const emblaApi = EmblaCarousel(emblaNode, options, [Autoplay()]);
}

// Carousel images slider
const carouselImages = document.querySelector('.carousel.slider-images');
if (carouselImages) {
  const viewportNode = carouselImages.querySelector('.embla__viewport');
  const carouselOptions = {
    loop: true,
    slidesToScroll: 1,
    slidesToShow: 3,
  };
  const carousel = EmblaCarousel(viewportNode, carouselOptions, [Autoplay()]);
}

// Carousel icons
const carouselIcons = document.querySelector('.carousel.slider-icons');
if (carouselIcons) {
  const viewportNode = carouselIcons.querySelector('.embla__viewport');
  const carouselOptions = {
    loop: true,
    slidesToScroll: 1,
  };
  const carousel = EmblaCarousel(viewportNode, carouselOptions, [Autoplay()]);
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
  };

  const emblaApi = EmblaCarousel(viewportNode, timelineOptions);

  if (slides.length > 0) {
    slides[0].classList.add('active');
  }

  const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
    emblaApi,
    prevBtn,
    nextBtn
  );

  emblaApi.on('destroy', removePrevNextBtnsClickHandlers);

  emblaApi.on('select', () => {
    const activeIndex = emblaApi.selectedScrollSnap();
    slides.forEach((slide) => slide.classList.remove('active'));
    slides[activeIndex].classList.add('active');
  });
}

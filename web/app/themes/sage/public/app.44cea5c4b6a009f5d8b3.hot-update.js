self["webpackHotUpdate_roots_bud_sage_sage"]("app",{

/***/ "../node_modules/@roots/bud-support/lib/css-loader/index.cjs??css!../node_modules/postcss-loader/dist/cjs.js??postcss!../node_modules/resolve-url-loader/index.js??resolveUrl!../node_modules/sass-loader/dist/cjs.js??sass!./styles/app.scss":
/*!****************************************************************************************************************************************************************************************************************************************************!*\
  !*** ../node_modules/@roots/bud-support/lib/css-loader/index.cjs??css!../node_modules/postcss-loader/dist/cjs.js??postcss!../node_modules/resolve-url-loader/index.js??resolveUrl!../node_modules/sass-loader/dist/cjs.js??sass!./styles/app.scss ***!
  \****************************************************************************************************************************************************************************************************************************************************/
/***/ (() => {

throw new Error("Module build failed (from ../node_modules/sass-loader/dist/cjs.js):\nSassError: expected \"{\".\n   ╷\n63 │ @import 'blocks/text-with-media';\n   │                                 ^\n   ╵\n  resources/styles/scss/global.scss 63:33  @import\n  resources/styles/app.scss 4:9            root stylesheet");

/***/ }),

/***/ "./scripts/app.js":
/*!************************!*\
  !*** ./scripts/app.js ***!
  \************************/
/***/ ((__webpack_module__, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _roots_sage_client_dom_ready__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @roots/sage/client/dom-ready */ "../node_modules/@roots/sage/lib/client/dom-ready.js");
/* harmony import */ var _custom_Header_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./custom/Header.js */ "./scripts/custom/Header.js");
/* harmony import */ var _custom_Slider_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./custom/Slider.js */ "./scripts/custom/Slider.js");
/* harmony import */ var _custom_StatsCounter_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./custom/StatsCounter.js */ "./scripts/custom/StatsCounter.js");
/* harmony import */ var _custom_Footer_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./custom/Footer.js */ "./scripts/custom/Footer.js");
/* harmony import */ var _custom_Beacon_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./custom/Beacon.js */ "./scripts/custom/Beacon.js");
/* harmony import */ var _custom_TeamTab_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./custom/TeamTab.js */ "./scripts/custom/TeamTab.js");
/* harmony import */ var _custom_Banner_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./custom/Banner.js */ "./scripts/custom/Banner.js");
var _import$meta$webpackH;









/**
 * Application entrypoint
 */
(0,_roots_sage_client_dom_ready__WEBPACK_IMPORTED_MODULE_0__["default"])(async () => {
  /**
   * Load more posts
   */
  const loadMoreButton = document.getElementById('load-more');
  const cardsWrapper = document.querySelector('.cards-wrapper');
  const spinner = document.querySelector('.spinner');
  let currentPage = 1;
  let isLoading = false;
  if (loadMoreButton) {
    loadMoreButton.addEventListener('click', async e => {
      const num = e.target.getAttribute('data-num');

      // Increment the current page
      currentPage++;

      // Check if a request is already in progress
      if (isLoading) {
        return;
      }

      // Set the isLoading flag to true
      isLoading = true;

      // Show the spinner after 0.5 seconds
      const spinnerTimeout = setTimeout(() => {
        spinner.style.display = 'flex';
      }, 500);
      const response = await fetch(`/wp-json/v1/posts/load_more?page=${currentPage}&per_page=${num}`);
      const newPosts = await response.json();
      // Check if there are new posts
      if (newPosts.length > 0) {
        // Convert the posts to HTML
        const postsHtml = newPosts.map(post => `<div class="card new-card" style="opacity: 0">${post}</div>`).join('');
        // Render the new cards
        cardsWrapper.insertAdjacentHTML('beforeend', postsHtml);

        // Fade in the new cards in order
        const newCards = cardsWrapper.querySelectorAll('.new-card');
        newCards.forEach((card, index) => {
          setTimeout(() => {
            card.style.opacity = 1;
            card.style.transition = 'opacity 0.5s ease-in-out';
            setTimeout(() => {
              card.classList.remove('new-card');
            }, 500);
          }, index * 100);
        });
      }

      // Hide the spinner
      clearTimeout(spinnerTimeout);
      spinner.style.display = 'none';

      // Set the isLoading flag to false
      isLoading = false;
      if (newPosts.length < num) {
        loadMoreButton.remove();
      }
    });
  }

  /**
   * Load more matches
   */

  const loadMoreMatchesButton = document.getElementById('loadMoreMatches');
  const matchResults = Array.from(document.querySelectorAll('.football-team__matches__result'));
  if (loadMoreMatchesButton) {
    loadMoreMatchesButton.addEventListener('click', function () {
      const hiddenMatches = matchResults.filter(function (result) {
        return result.style.display === 'none';
      });
      hiddenMatches.slice(0, 3).forEach(function (match) {
        match.style.display = 'flex';
        match.classList.add('loaded');
      });

      // Fade in the new cards in order
      const moreMatches = document.querySelectorAll('.loaded');
      moreMatches.forEach((card, index) => {
        setTimeout(() => {
          card.style.opacity = 1;
          card.style.transition = 'opacity 0.5s ease-in-out';
          setTimeout(() => {
            card.classList.remove('new-card');
          }, 500);
        }, index * 100);
      });
      if (hiddenMatches.length <= 3) {
        loadMoreMatchesButton.style.display = 'none';
      }
    });
  }

  /**
   * Info Banner Cookies
   */
  const infoBannerElement = document.querySelector('.info-banner');
  if (infoBannerElement) {
    new _custom_Banner_js__WEBPACK_IMPORTED_MODULE_7__["default"](infoBannerElement);
  }
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
(_import$meta$webpackH = __webpack_module__.hot) === null || _import$meta$webpackH === void 0 ? void 0 : _import$meta$webpackH.accept(console.error);

/***/ }),

/***/ "./scripts/custom/Header.js":
/*!**********************************!*\
  !*** ./scripts/custom/Header.js ***!
  \**********************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/*
* Nav menu
* Handles the header navigation drop down and hamburger menu
*/
let menuItems = document.querySelectorAll('li.menu-item-has-children');
const heroImage = document.querySelector('.hero-fp__image');
const heroNav = document.querySelector('.header__wrapper__nav');
const headerNavInner = document.querySelector('.header__wrapper__nav__inner');
const header = document.querySelector('.header');
const hamb = document.querySelector('.hamb');
const dropdown = document.querySelector('.nav');
let subMenuItems = Array.from(dropdown.querySelectorAll('li.menu-item-has-children'));
hamb.addEventListener('click', function (e) {
  e.preventDefault();
  if (dropdown) {
    dropdown.classList.toggle('drop-open');
    this.classList.toggle('hamb-open');
  }
});
let isScrolled = false;
window.addEventListener('scroll', function () {
  if (window.scrollY > 0 && !isScrolled) {
    header.classList.add('js-menu-scrolled');
    isScrolled = true;
  } else if (window.scrollY === 0 && isScrolled) {
    header.classList.remove('js-menu-scrolled');
    isScrolled = false;
  }
});
window.addEventListener('click', function (event) {
  if (!dropdown.contains(event.target) && !hamb.contains(event.target)) {
    hamb.classList.remove('hamb-open');
    dropdown.classList.remove('drop-open');
  }
  subMenuItems.forEach(function (menu) {
    if (!menu.contains(event.target)) {
      menu.classList.remove('open');
      menu.querySelector('button').setAttribute('aria-expanded', 'false');
      menu.querySelector('a').setAttribute('aria-expanded', 'false');
    }
  });
});
Array.prototype.forEach.call(menuItems, function (el) {
  let activatingA = el.querySelector('a');
  function menuToggle(event) {
    if (!this.parentNode.classList.contains('open')) {
      let elems = document.querySelectorAll('.open');
      [].forEach.call(elems, function (el) {
        el.classList.remove('open');
        el.querySelector('button').setAttribute('aria-expanded', 'false');
        el.querySelector('a').setAttribute('aria-expanded', 'false');
      });
      this.parentNode.classList.add('open');
      this.parentNode.querySelector('a').setAttribute('aria-expanded', 'true');
      this.parentNode.querySelector('button').setAttribute('aria-expanded', 'true');
      let subMenuItems = Array.from(this.nextElementSibling.querySelectorAll('.menu-item'));
      subMenuItems.forEach(item => {
        item.firstChild.setAttribute('tabindex', 0);
      });
    } else {
      this.parentNode.classList.remove('open');
      this.parentNode.querySelector('a').setAttribute('aria-expanded', 'false');
      this.parentNode.querySelector('button').setAttribute('aria-expanded', 'false');
    }
    event.preventDefault();
  }
  let btn = '<button class="sub-menu-btn" aria-haspopup="true" aria-expanded="false" tabindex="0"><span class="caret"></span><span class="visually-hidden">show submenu for ' + activatingA.text + '</span></button>';
  activatingA.insertAdjacentHTML('afterend', btn);
  el.querySelector('button').addEventListener('click', menuToggle);
});

/*
* Front page hero nav
* Handle the front page hero nav width and style
*/
function adjustHeroNavWidth() {
  if (document.body.classList.contains('home') && window.matchMedia('(min-width: 992px)').matches && document.querySelector('.hero-fp__image')) {
    if (headerNavInner.offsetWidth + 33 <= heroImage.offsetWidth) {
      heroNav.style.width = heroImage.offsetWidth + 'px';
      header.classList.remove('default');
    } else {
      header.classList.add('default');
    }
  } else {
    header.classList.add('default');
  }
  if (window.matchMedia('(max-width: 992px)').matches) {
    heroNav.style.width = 'auto';
  }
}

// Call the function on page load
document.addEventListener('DOMContentLoaded', adjustHeroNavWidth);

// Call the function on window resize
window.addEventListener('resize', adjustHeroNavWidth);

// Call the function on orientation change
window.addEventListener('orientationchange', adjustHeroNavWidth);

// Front page hero nav scroll variation
function debounce(func, wait) {
  let timeout;
  return function () {
    const context = this;
    const args = arguments;
    clearTimeout(timeout);
    timeout = setTimeout(function () {
      func.apply(context, args);
    }, wait);
  };
}
window.addEventListener('scroll', debounce(function () {
  let scrollY = window.scrollY;
  if (document.body.classList.contains('home') && window.matchMedia('(min-width: 992px)').matches && !header.classList.contains('default')) {
    if (scrollY >= 60) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  }
}, 10));

/***/ }),

/***/ "./scripts/custom/Slider.js":
/*!**********************************!*\
  !*** ./scripts/custom/Slider.js ***!
  \**********************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
Object(function webpackMissingModule() { var e = new Error("Cannot find module 'embla-carousel'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());
Object(function webpackMissingModule() { var e = new Error("Cannot find module 'embla-carousel-autoplay'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());


const emblaNode = document.querySelector('.embla');
const options = {
  loop: true
};
if (emblaNode) {
  const emblaApi = Object(function webpackMissingModule() { var e = new Error("Cannot find module 'embla-carousel'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())(emblaNode, options, [Object(function webpackMissingModule() { var e = new Error("Cannot find module 'embla-carousel-autoplay'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())()]);
}

/***/ })

});
//# sourceMappingURL=app.44cea5c4b6a009f5d8b3.hot-update.js.map
self["webpackHotUpdate_roots_bud_sage_sage"]("app",{

/***/ "../node_modules/@roots/bud-support/lib/css-loader/index.cjs??css!../node_modules/postcss-loader/dist/cjs.js??postcss!../node_modules/resolve-url-loader/index.js??resolveUrl!../node_modules/sass-loader/dist/cjs.js??sass!./styles/app.scss":
/*!****************************************************************************************************************************************************************************************************************************************************!*\
  !*** ../node_modules/@roots/bud-support/lib/css-loader/index.cjs??css!../node_modules/postcss-loader/dist/cjs.js??postcss!../node_modules/resolve-url-loader/index.js??resolveUrl!../node_modules/sass-loader/dist/cjs.js??sass!./styles/app.scss ***!
  \****************************************************************************************************************************************************************************************************************************************************/
/***/ (() => {

throw new Error("Module build failed (from ../node_modules/sass-loader/dist/cjs.js):\nSassError: expected \"{\".\n  ╷\n3 │     display: flex;\n  │                  ^\n  ╵\n  resources/styles/scss/sections/_error.scss 3:18  @import\n  resources/styles/scss/global.scss 33:9           @import\n  resources/styles/app.scss 5:9                    root stylesheet");

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
/* harmony import */ var _custom_SwiffySlider_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./custom/SwiffySlider.js */ "./scripts/custom/SwiffySlider.js");
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

/***/ "./scripts/custom/Banner.js":
/*!**********************************!*\
  !*** ./scripts/custom/Banner.js ***!
  \**********************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ InfoBannerCookies)
/* harmony export */ });
class InfoBannerCookies {
  constructor(infoBanner) {
    this.state = {
      bannerContents: infoBanner.textContent
    };
    this.bindUI(infoBanner);
    this.attachEvents();
    this.onLoad();
  }
  bindUI(infoBanner) {
    this.infoBanner = infoBanner;
    this.closeButton = this.infoBanner.querySelector('.info-banner__close-btn');
  }
  attachEvents() {
    if (this.closeButton) {
      this.closeButton.addEventListener('click', this.closeBanner.bind(this));
    }
  }
  checkLocalStorage() {
    return window.localStorage.getItem('infoBanner') === this.state.bannerContents;
  }
  onLoad() {
    const bannerDismissed = this.checkLocalStorage();
    if (bannerDismissed) {
      this.infoBanner.remove();
    }
  }
  closeBanner() {
    window.localStorage.setItem('infoBanner', this.state.bannerContents);
    this.infoBanner.remove();
  }
}

/***/ }),

/***/ "./scripts/custom/TeamTab.js":
/*!***********************************!*\
  !*** ./scripts/custom/TeamTab.js ***!
  \***********************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
function showTeam(evt, team) {
  // Declare all variables
  var i, results__team, results__tab;

  // Get all elements with class="results__team" and hide them
  results__team = document.getElementsByClassName('results__team');
  for (i = 0; i < results__team.length; i++) {
    results__team[i].style.display = 'none';
  }

  // Get all elements with class="results__tab" and remove the class "active"
  results__tab = document.getElementsByClassName('results__tab');
  for (i = 0; i < results__tab.length; i++) {
    results__tab[i].className = results__tab[i].className.replace(' active', '');
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(team).style.display = 'block';
  evt.currentTarget.className += ' active';
}
const teamTabs = document.querySelectorAll('.results__tab');
if (teamTabs) {
  teamTabs.forEach(function (tab) {
    tab.addEventListener('click', function (evt) {
      showTeam(evt, tab.dataset.team);
    });
    if (tab.id === 'defaultOpen') {
      tab.click();
    }
  });
}

/***/ })

});
//# sourceMappingURL=app.18f4e08326fca236423e.hot-update.js.map
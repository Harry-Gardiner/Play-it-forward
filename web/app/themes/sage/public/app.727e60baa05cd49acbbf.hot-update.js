"use strict";
self["webpackHotUpdate_roots_bud_sage_sage"]("app",{

/***/ "./scripts/app.js":
/*!************************!*\
  !*** ./scripts/app.js ***!
  \************************/
/***/ ((__webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _roots_sage_client_dom_ready__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @roots/sage/client/dom-ready */ "../node_modules/@roots/sage/lib/client/dom-ready.js");
/* harmony import */ var _custom_Header_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./custom/Header.js */ "./scripts/custom/Header.js");
/* harmony import */ var _custom_SwiffySlider_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./custom/SwiffySlider.js */ "./scripts/custom/SwiffySlider.js");
/* harmony import */ var _custom_StatsCounter_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./custom/StatsCounter.js */ "./scripts/custom/StatsCounter.js");
/* harmony import */ var _custom_Footer_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./custom/Footer.js */ "./scripts/custom/Footer.js");
/* harmony import */ var _custom_Beacon_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./custom/Beacon.js */ "./scripts/custom/Beacon.js");
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
  document.addEventListener('DOMContentLoaded', function () {
    var loadMoreMatchesButton = document.getElementById('loadMoreMatches');
    var matchResults = Array.from(document.querySelectorAll('.football-team__matches__result'));
    loadMoreMatchesButton.addEventListener('click', function () {
      var hiddenMatches = matchResults.filter(function (result) {
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
  });
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
(_import$meta$webpackH = __webpack_module__.hot) === null || _import$meta$webpackH === void 0 ? void 0 : _import$meta$webpackH.accept(console.error);

/***/ })

});
//# sourceMappingURL=app.727e60baa05cd49acbbf.hot-update.js.map
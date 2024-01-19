import domReady from '@roots/sage/client/dom-ready';
import './custom/Header.js';
import './custom/Slider.js';
import './custom/StatsCounter.js';
import './custom/Footer.js';
import './custom/Beacon.js';
import './custom/TeamTab.js';
import InfoBannerCookies from './custom/Banner.js';

/**
 * Application entrypoint
 */
domReady(async () => {
  /**
   * Load more posts
   */
  const loadMoreButton = document.getElementById('load-more');
  const cardsWrapper = document.querySelector('.cards-wrapper');
  const spinner = document.querySelector('.spinner');
  let currentPage = 1;
  let isLoading = false;
  if (loadMoreButton) {
    loadMoreButton.addEventListener('click', async (e) => {
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

      const response = await fetch(
        `/wp-json/v1/posts/load_more?page=${currentPage}&per_page=${num}`
      );
      const newPosts = await response.json();
      // Check if there are new posts
      if (newPosts.length > 0) {
        // Convert the posts to HTML
        const postsHtml = newPosts
          .map(
            (post) =>
              `<div class="card new-card" style="opacity: 0">${post}</div>`
          )
          .join('');
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
  const matchResults = Array.from(
    document.querySelectorAll('.football-team__matches__result')
  );
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
    new InfoBannerCookies(infoBannerElement);
  }
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);

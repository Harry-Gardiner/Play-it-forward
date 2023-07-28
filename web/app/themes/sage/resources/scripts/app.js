import domReady from '@roots/sage/client/dom-ready';
import Header from './custom/Header.js'

/**
 * Application entrypoint
 */
domReady(async () => {
  //
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);

/**
 * Load more posts
 */
const loadMoreButton = document.getElementById('load-more');
const cardsWrapper = document.querySelector('.cards-wrapper');
const spinner = document.querySelector('.spinner');
let currentPage = 1;

loadMoreButton.addEventListener('click', async () => {
  // Show the spinner
  spinner.style.display = 'flex';

  // Increment the current page
  currentPage++;

  const response = await fetch(`/wp-json/v1/posts/load_more?page=${currentPage}&per_page=10`);
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
        // opacity duration must match the setTimeout duration
        card.style.transition = 'opacity 0.5s ease-in-out';
        setTimeout(() => {
          card.classList.remove('new-card');
        }, 500);
      }, index * 300);
    });
  }

  // Hide the spinner
  spinner.style.display = 'none';

  if (newPosts.length < 10) {
    loadMoreButton.remove();
  }
});
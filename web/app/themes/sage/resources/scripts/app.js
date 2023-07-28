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
let currentPage = 1;
// let posts = [];

loadMoreButton.addEventListener('click', async () => {
   // Increment the current page
   currentPage++;

  const response = await fetch(`/wp-json/v1/posts/load_more?page=${currentPage}&per_page=10`);
  const newPosts = await response.json();
  // Check if there are new posts
  if (newPosts.length > 0) {
    // Convert the posts to HTML
    const postsHtml = newPosts.join('');
    // Render the new posts
    cardsWrapper.insertAdjacentHTML('beforeend', postsHtml);
  }
});
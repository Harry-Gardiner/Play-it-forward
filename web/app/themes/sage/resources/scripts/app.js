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
let posts = [];

loadMoreButton.addEventListener('click', async () => {
  const response = await fetch(`/wp-json/v1/posts/load_more?page=${currentPage}&per_page=10`);
  const newPosts = await response.json();
  // Check if there are new posts
  if (newPosts.length > 0) {
    // Filter out any duplicates
    const filteredPosts = newPosts.filter(post => !posts.find(p => p.id === post.id));

    // Add the new posts to the existing posts array
    posts = [...posts, ...filteredPosts];

    // Convert the posts to HTML
    const postsHtml = posts.join('');
    // Render the new posts
    cardsWrapper.insertAdjacentHTML('beforeend', postsHtml);
  
    // Increment the current page
    currentPage++;
  }
});
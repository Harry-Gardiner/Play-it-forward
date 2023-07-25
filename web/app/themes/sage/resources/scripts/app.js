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

    // Render the new posts
    filteredPosts.forEach(post => {
      const cardHtml = `
        <div class="card">
          <h2>${post.title}</h2>
          <p>${post.excerpt}</p>
          <a href="${post.link}">Read more</a>
        </div>
      `;
      cardsWrapper.insertAdjacentHTML('beforeend', cardHtml);
    });

    // Increment the current page
    currentPage++;
  }
});
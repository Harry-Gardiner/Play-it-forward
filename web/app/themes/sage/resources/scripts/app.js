import domReady from '@roots/sage/client/dom-ready';

/**
 * Application entrypoint
 */
domReady(async () => {
  // ...
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
import.meta.webpackHot?.accept(console.error);

/**
 * Nav toggle
 */
const dropdownBtn = document.querySelector(".caret");
const dropdownMenu = document.querySelector(".sub-menu");

const toggleDropdown = function () {
  dropdownMenu.classList.toggle("show");
  dropdownBtn.classList.toggle("active");
};

dropdownBtn.addEventListener("click", function (e) {
  e.stopPropagation();
  toggleDropdown();
});

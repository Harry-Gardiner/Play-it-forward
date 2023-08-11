import domReady from '@roots/sage/client/dom-ready';
import Header from './custom/Header.js';
import SwiffySlider from './custom/SwiffySlider.js';

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

/*
* Nav menu
* Handles the header navigation drop down and hamburger menu
*/
let menuItems = document.querySelectorAll('li.menu-item-has-children');

const hamb = document.querySelector('.hamb');
const dropdown = document.querySelector('.nav');
let subMenuItems = Array.from(
  dropdown.querySelectorAll('li.menu-item-has-children')
);

hamb.addEventListener('click', function (e) {
  e.preventDefault();
  if (dropdown) {
    dropdown.classList.toggle('drop-open');
    this.classList.toggle('hamb-open')
  }
});

window.addEventListener('click', function (event) {
  if (!dropdown.contains(event.target) && !hamb.contains(event.target)) {
    hamb.classList.remove('hamb-open')
    dropdown.classList.remove('drop-open');
  }

  subMenuItems.forEach(function (menu) {
    if (!menu.contains(event.target)) {
      menu.classList.remove('open');
      menu.querySelector('button').setAttribute('aria-expanded', 'false');
      menu.querySelector('a').setAttribute('aria-expanded', 'false');
    }
  });
})

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
      this.parentNode
        .querySelector('button')
        .setAttribute('aria-expanded', 'true');

      let subMenuItems = Array.from(
        this.nextElementSibling.querySelectorAll('.menu-item')
      );
      subMenuItems.forEach((item) => {
        item.firstChild.setAttribute('tabindex', 0);
      });
    } else {
      this.parentNode.classList.remove('open');
      this.parentNode.querySelector('a').setAttribute('aria-expanded', 'false');
      this.parentNode
        .querySelector('button')
        .setAttribute('aria-expanded', 'false');
    }
    event.preventDefault();
  }

  let btn =
    '<button class="sub-menu-btn" aria-haspopup="true" aria-expanded="false" tabindex="0"><span class="caret"></span><span class="visually-hidden">show submenu for ' +
    activatingA.text +
    '</span></button>';

  activatingA.insertAdjacentHTML('afterend', btn);

  el.querySelector('button').addEventListener('click', menuToggle);
});

/*
* Front page hero nav
* Handles the front page hero nav width
*/
function adjustHeroNavWidth() {
  const heroImage = document.querySelector('.hero__image');
  const heroNav = document.querySelector('.header__wrapper__nav');
  const headerNavInner = document.querySelector('.header__wrapper__nav__inner');
  const header = document.querySelector('.header');

  if (document.body.classList.contains('home') && window.matchMedia('(min-width: 992px)').matches && document.querySelector('.hero__image')) {
    if ((headerNavInner.offsetWidth + 33) <= heroImage.offsetWidth) {
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

/**
 * Sub Nav toggle
 *
 * The mobile menu toggle is controlled using a checkbox and css, no JS applied.
 * Subnav logic open and close is controlled below.
 */

const dropdownBtns = document.querySelectorAll('.caret');
const dropdownMenus = document.querySelectorAll('.sub-menu');
const navItems = document.querySelectorAll('.menu-item a');

function toggleSubnav(e) {
  for (var i = 0; i < dropdownBtns.length; i++) {
    const visuallyHiddenText = dropdownBtns[i].firstElementChild;
    const subnav = dropdownBtns[i].nextElementSibling;

    if (dropdownBtns[i] == e.target) {
      dropdownBtns[i].classList.toggle('active');

      if (dropdownBtns[i].classList.contains('active')) {
        visuallyHiddenText.innerHTML = 'Click to close the subnav';
        // dropdownBtns[i].setAttribute('aria-controls', '')
      } else {
        visuallyHiddenText.innerHTML = 'Click to access dropdown menu';
        // dropdownBtns[i].setAttribute('aria-controls', false)
      }

      subnav.classList.toggle('open');

      if (subnav.classList.contains('open')) {
        subnav.setAttribute('aria-expanded', true)
      } else {
        subnav.setAttribute('aria-expanded', false)
      }

    } else {
      dropdownBtns[i].classList.remove('active');
      visuallyHiddenText.innerHTML = 'Click to access dropdown menu';
      dropdownBtns[i].nextElementSibling.classList.remove('open');
    }
  }
}

// Handle dropdowns
dropdownBtns.forEach((button) => {
  button.addEventListener('click', function (target) {
    target.stopPropagation();
    toggleSubnav(target);
  });
});

// Close all subnavs if open
function closeNavs() {
  dropdownBtns.forEach((button) => {
    button.classList.remove('active');
  });
  dropdownMenus.forEach((menu) => {
    menu.classList.remove('open');
  });
}

// Handles moving out of the nav
navItems.forEach((item) => {
  item.addEventListener('click', function (e) {
    closeNavs();
  });
});

// Handle closing subnav if clicking outside of nav
document.addEventListener('click', function (event) {
  closeNavs();
});

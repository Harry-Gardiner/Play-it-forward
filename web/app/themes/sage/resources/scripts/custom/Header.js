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
    if (dropdownBtns[i] == e.target) {
      dropdownBtns[i].classList.toggle('active');
      dropdownBtns[i].nextElementSibling.classList.toggle('open');
    } else {
      dropdownBtns[i].classList.remove('active');
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
function closeNavs(){
  dropdownBtns.forEach(button => {
    button.classList.remove('active');
  })
  dropdownMenus.forEach(menu => {
    menu.classList.remove('open');
  });
}

// Handles moving out of the nav
navItems.forEach(item => {
  item.addEventListener('click', function (e){
    closeNavs()
  })
});

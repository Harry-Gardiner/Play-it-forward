/**
 * Sub Nav toggle
 * 
 * The mobile menu toggle is controlled using a checkbox and css, no JS applied.
 * Subnav logic open and close is controlled below.
 */

const dropdownBtns = document.querySelectorAll('.caret');
const dropdownMenus = document.querySelectorAll('.sub-menu');
const navItems = document.querySelectorAll('.menu-item a');

// Toggle targeted sub nav
const toggleDropdown = function (e) {
  e.target.classList.toggle('active');
  var subnav = e.target.nextElementSibling;
  subnav.classList.toggle('show');
};

// Close non target subnavs if open
const closeOtherSubNavs = function (e) {
    dropdownMenus.forEach(menu => {
        if(menu === e.target.nextElementSibling) return;
        menu.classList.remove('show');
        menu.previousElementSibling.classList.remove('active');
    });
}

// Handle dropdowns
dropdownBtns.forEach((button) => {
  button.addEventListener('click', function (e) {
    e.stopPropagation();
    toggleDropdown(e);
    closeOtherSubNavs(e);
  });
});

// Close all subnavs if open
function closeNavs(){
  dropdownBtns.forEach(button => {
    button.classList.remove('active');
  })
  dropdownMenus.forEach(menu => {
    menu.classList.remove('show');
  });
}

// Handles moving out of the nav
navItems.forEach(item => {
  item.addEventListener('click', function (e){
    closeNavs()
  })
});

/**
 * Sub Nav toggle
 * 
 * The mobile menu toggle is controlled using a checkbox and css, no JS applied.
 * Subnav logic open and close is controlled below.
 */
const dropdownBtns = document.querySelectorAll('.caret');
const dropdownMenus = document.querySelectorAll('.sub-menu');
const navItems = document.querySelectorAll('.menu-item a');

const toggleDropdown = function (e) {
  e.target.classList.toggle('active');
  var subnav = e.target.nextElementSibling;
  subnav.classList.toggle('show');
};

const closeOtherSubNavs = function (e) {
    dropdownMenus.forEach(menu => {
        if(menu === e.target.nextElementSibling) return;
        menu.classList.remove('show');
        menu.previousElementSibling.classList.remove('active');
    });
}

dropdownBtns.forEach((button) => {
  button.addEventListener('click', function (e) {
    e.stopPropagation();
    toggleDropdown(e);
    closeOtherSubNavs(e);
  });
});

function closeNavs(){
  dropdownBtns.forEach(button => {
    button.classList.remove('active');
  })
  dropdownMenus.forEach(menu => {
    menu.classList.remove('show');
  });
}

navItems.forEach(item => {
  item.addEventListener('click', function (e){
    closeNavs()
  })
});

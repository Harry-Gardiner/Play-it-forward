/**
 * Nav toggle
 */
const dropdownBtns = document.querySelectorAll('.caret');
const dropdownMenus = document.querySelectorAll('.sub-menu');

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

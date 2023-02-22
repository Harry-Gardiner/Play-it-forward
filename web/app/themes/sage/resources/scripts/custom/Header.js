/**
 * Nav toggle
 */
const dropdownBtns = document.querySelectorAll('.caret');
const dropdownMenu = document.querySelector('.sub-menu');

const toggleDropdown = function (e) {
  e.target.classList.toggle('active');
  var subnav = e.target.nextElementSibling;
  subnav.classList.toggle('show');
};

dropdownBtns.forEach((button) => {
  button.addEventListener('click', function (e) {
    e.stopPropagation();
    toggleDropdown(e);
  });
});

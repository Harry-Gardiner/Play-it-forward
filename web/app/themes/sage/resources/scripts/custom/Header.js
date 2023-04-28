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

// if (dropdown.classList.contains('drop-open')) {
//   toggleSubMenuItems();
// }

// function toggleSubMenuItems(subMenuItems){
//   subMenuItems.forEach(item => {
//     if (dropdown.classList.contains('drop-open')) {
//         console.log('click');
//     }
//   })
// }

// Array.prototype.forEach.call(menuItems, function (el) {
//   el.addEventListener('mouseover', function () {
//     // this.classList.add('open');
//     // this.querySelector('.sub-menu-btn').setAttribute('aria-expanded', 'true');
//     this.querySelector('.sub-menu-btn').disabled = true;
//   });
//   el.addEventListener('mouseleave', function () {
//     // el.classList.remove('open');
//     // el.querySelector('.sub-menu-btn').setAttribute('aria-expanded', 'false');
//     this.querySelector('.sub-menu-btn').disabled = false;
//   });
// });

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

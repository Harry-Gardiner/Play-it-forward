var menuItems = document.querySelectorAll('li.menu-item-has-children');

Array.prototype.forEach.call(menuItems, function (el) {
  el.addEventListener('mouseover', function () {
    this.classList.add('open');
    this.querySelector('.sub-menu-btn').setAttribute('aria-expanded', 'true');
  });
  el.addEventListener('mouseleave', function () {
    el.classList.remove('open');
    el.querySelector('.sub-menu-btn').setAttribute('aria-expanded', 'false');
  });
});

Array.prototype.forEach.call(menuItems, function (el) {
  var activatingA = el.querySelector('a');

  function menuToggle(event) {
    if (!this.parentNode.classList.contains('open')) {
      var elems = document.querySelectorAll('.open');
      [].forEach.call(elems, function (el) {
        el.classList.remove('open');
        // console.log(el.childNodes);
        el.querySelector('button').setAttribute('aria-expanded', 'false');
        el.querySelector('a').setAttribute('aria-expanded', 'false');
      });

      this.parentNode.classList.add('open');
      this.parentNode.querySelector('a').setAttribute('aria-expanded', 'true');
      this.parentNode
        .querySelector('button')
        .setAttribute('aria-expanded', 'true');
    }
    else {
      this.parentNode.classList.remove('open');
      this.parentNode.querySelector('a').setAttribute('aria-expanded', 'false');
      this.parentNode
        .querySelector('button')
        .setAttribute('aria-expanded', 'false');
    }
    event.preventDefault();
  }

  var btn =
    '<button class="sub-menu-btn" aria-haspopup="true" aria-expanded="false" tabindex="0"><span class="caret"></span><span class="visually-hidden">show submenu for ' +
    activatingA.text +
    '</span></button>';

  activatingA.insertAdjacentHTML('afterend', btn);

  el.querySelector('button').addEventListener('click', menuToggle);
});

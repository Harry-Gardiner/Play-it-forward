var menuItems = document.querySelectorAll('li.menu-item-has-children');

Array.prototype.forEach.call(menuItems, function (el) {
  el.addEventListener('mouseover', function () {
    this.classList.add('open');
    this.querySelector('.caret').setAttribute('aria-expanded', 'true');
  });
  el.addEventListener('mouseleave', function () {
    setTimeout(function () {
      el.classList.remove('open');
      el.querySelector('.caret').setAttribute('aria-expanded', 'false');
    }, 300);
  });
});

Array.prototype.forEach.call(menuItems, function (el) {
  var activatingA = el.querySelector('a');

  var btn =
    '<button class="caret" aria-haspopup="true" aria-expanded="false" tabindex="0"><span class="visually-hidden">show submenu for ' +
    activatingA.text +
    '</span></button>';
  activatingA.insertAdjacentHTML('afterend', btn);

  el.querySelector('button').addEventListener('click', function (event) {
    if (!this.parentNode.classList.contains('open'))  {
      this.parentNode.classList.add('open');
      this.parentNode.querySelector('a').setAttribute('aria-expanded', 'true');
      this.parentNode
        .querySelector('button')
        .setAttribute('aria-expanded', 'true');
    } else {
      this.parentNode.classList.remove('open');
      this.parentNode.querySelector('a').setAttribute('aria-expanded', 'false');
      this.parentNode
        .querySelector('button')
        .setAttribute('aria-expanded', 'false');
    }
    event.preventDefault();
  });
});

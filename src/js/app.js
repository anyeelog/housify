document.addEventListener('DOMContentLoaded', function() {
  eventListeners();
  darkMode();
});

function darkMode() {
  const btnDarkMode = document.querySelector('.dark-mode-btn');

  btnDarkMode.addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
  });
}

function eventListeners() {
  const mobileMenu = document.querySelector('.mobile-menu');

  mobileMenu.addEventListener('click', responsiveNav);
}

function responsiveNav() {
  const nav = document.querySelector('.navigation');

  if(nav.classList.contains('show')) {
    nav.classList.remove('show');
  } else {
    nav.classList.add('show');
  }
}

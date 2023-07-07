document.addEventListener('DOMContentLoaded', function() {
  eventListeners();
  // darkMode();
});

// function darkMode() {

//   const btnDarkMode = document.querySelector('.dark-mode-btn');

//   btnDarkMode.addEventListener('click', function() {
//     document.body.classList.toggle('dark-mode');
//   });

// }

function eventListeners() {

  const mobileMenu = document.querySelector('.mobile-menu');
  mobileMenu.addEventListener('click', responsiveNav);


  // Shows conditionals
  const contactMethod = document.querySelectorAll('input[name="contact[contact]"]');
  contactMethod.forEach(input => input.addEventListener('click', showContactMethods));

}

function responsiveNav() {

  const nav = document.querySelector('.navigation');

  if(nav.classList.contains('show')) {
    nav.classList.remove('show');
  } else {
    nav.classList.add('show');
  }

}

function showContactMethods(e) {

  const contactDiv = document.querySelector('#contact');

  if(e.target.value === 'phone') {
    contactDiv.innerHTML = `
      <label for="phone">Number</label>
      <input type="text" id="phone" placeholder="Your phone number" name="contact[phone]" required>

      <p>Choose date and time for the call:</p>

      <label for="date">Date:</label>
      <input type="date" id="date" name="contact[date]">

      <label for="time">Time:</label>
      <input type="time" id="time" min="09:00" max="18:00" name="contact[time]">
    `;
  } else {
    contactDiv.innerHTML = `
      <label for="email">Email</label>
      <input type="text" id="email" placeholder="Your email" name="contact[email]" required>

    `;
  }

}
